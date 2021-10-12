<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Helper;
use App\Models\Announcement;
use App\Models\User;
use App\Models\ChMessage;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;

class HelperController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $helper = Helper::find($id);

        if (Auth::id() != $helper->helper_id) {
            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette candidature !');
        }

        if ($helper->status != 'selected') {
            $result = Helper::where('id', '=', $helper->id)->delete();  
        }

        if ($result) {
            return redirect()->route('helper.list')->with('success', 'Vous avez supprimer votre candidature');
        }
    }

    /**
     * Apply for an announcemennt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $announcementId
     * @return \Illuminate\Http\Response
     */
    public function apply($announcementId, Request $request) {
        $validated = $request->validate([
            'authId' => 'required|Numeric|min:0',
        ]);

        $alreadyApplied = Helper::where([
            ['announcement_id', '=', $announcementId],
            ['helper_id', '=', Auth::id()],
        ])->get();

        if (sizeof($alreadyApplied) === 0) {
            $result = DB::table('helpers')->insert([
                'announcement_id' => $announcementId,
                'helper_id' => $request->authId,
                'status' => 'pending',
            ]);
        } else {
            return redirect()->route('welcome')->with('error', 'Vous avez déjà proposé votre aider pour cette annonce');
        }

        $announcement = Announcement::find($announcementId);
        if ($result) {

            $result = ChMessage::insert([
                'id' => time(),
                'type' => 'user',
                'from_id' => Auth::id(),
                'to_id' => $announcement->applicant_user_id,
                'body' => 'CECI EST UN MESSAGE AUTOMATIQUE DU SITE : ' . Auth::user()->name . ' vient de postuler pour votre annonce "'. $announcement->title . '". N\'hésitez pas à entrer en communication avec.',
                'seen' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($result) {
            $applier = Auth::user();

            Mail::send('emails.apply', ['announcement' => $announcement, 'applier' => $applier],
            function($message) use ($announcement, $applier) {
                $message->from('allobricolo@communication.com', 'Allobricolo Communication');
                $message->to($announcement->applicant->email, $announcement->applicant->firstname)
                        ->subject('Un bricoleur vous a proposé son aide');
            });

            return redirect('/allobricolo/messagerie')->with('success', 'Candidature envoyée avec succès. Un mail a été envoyé à' . $announcement->applicant->firstname);
        } else {
            return redirect()->route('welcome')->with('error', 'Une erreur s\'est produite lors de votre candidature, veuillez réessayer plustard');
        }
    }

    /**
     * List all the announcements for which the helper has apply.
     *
     * @return \Illuminate\Http\Response
     */
    public function list() {
        $notSelectedHelper = Helper::where([
            ['helper_id', '=', Auth::id()],
            ['status', '=', 'not selected'],
        ])->simplePaginate(
            $perPage = 3, $columns = ['*'], $pageName = 'notSelectedHelper'
        );

        $selectedHelper = Helper::where([
            ['helper_id', '=', Auth::id()],
            ['status', '=', 'selected'],
        ])->simplePaginate(
            $perPage = 3, $columns = ['*'], $pageName = 'selectedHelper'
        );

        $pendingHelper = Helper::where([
            ['helper_id', '=', Auth::id()],
            ['status', '=', 'pending'],
        ])->simplePaginate(
            $perPage = 3, $columns = ['*'], $pageName = 'pendingHelper'
        );

        return view('helper.list', [
            'notSelectedHelper' => $notSelectedHelper,
            'pendingHelper' => $pendingHelper,
            'selectedHelper' => $selectedHelper,
        ]);
    }

    /**
     * Select a specified helper for the announcement.
     *
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request, $announcementId, $helperId) {
        $validated = $request->validate([
            'realised_at' => 'required|date',
        ]);

        $announcement = Announcement::find($announcementId);
        $helper = User::find($helperId);

        if ($announcement->id != Auth::id()) {
            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas l\'auteur de cette annonce');
        }

        $result = DB::table('helpers')
              ->where([
                  ['announcement_id', '=', $announcementId],
                  ['helper_id', '!=', $helperId],
              ])
              ->update(['status' => 'not selected']);
        
        $result = DB::table('helpers')
            ->where([
                ['announcement_id', '=', $announcementId],
                ['helper_id', '=', $helperId],
            ])
            ->update(['status' => 'selected']);

        $result = DB::table('announcements')
            ->where('id', '=', $announcementId)
            ->update(['realised_at' => date('Y-m-d H:i:s', strtotime($request->realised_at))]);

        Mail::send('emails.selectHelper', ['announcement' => $announcement, 'helper' => $helper],
        function($message) use ($announcement, $helper) {
            $message->from('allobricolo@communication.com', 'Allobricolo Communication');
            $message->to($helper->email, $helper->firstname)
                    ->subject('Vous avez été selectionner pour une annonce');
        });

        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
        
            $customer = Customer::create(array(
                'email' => Auth::user()->email,
                'source' => $request->stripeToken
            ));
        
            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $announcement->price * 100,
                'currency' => 'eur'
            ));
        
            return redirect()->route('helper.specifiedAnnouncement', $announcementId)->with('success', 'Vous avez bien selectionner le bricoleur et votre payement a bien été accepté');;
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

        return redirect()->route('announcement.show', $announcementId)->with('success', 'Vous avez bien selectionner le bricoleur');
    }

    /**
     * List all the announcements for a specified announcement.
     *
     * @return \Illuminate\Http\Response
     */
    public function specifiedAnnouncement($announcementId) {
        $announcement = Announcement::find($announcementId);

        if ($announcement->applicant_user_id != Auth::id()) {
            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas l\'auteur de cette annonce');
        }

        $selectedHelper = Helper::where([
            ['announcement_id', '=', $announcementId],
            ['status', '=', 'selected'],
        ])->get();

        $pendingHelpers = Helper::where([
            ['announcement_id', '=', $announcementId],
            ['status', '=', 'pending'],
        ])->simplePaginate(6);

        return view('helper.specified-announcement', [
            'announcement' => $announcement,
            'selectedHelper' => $selectedHelper,
            'pendingHelpers' => $pendingHelpers,
        ]);
    }
}
