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

class HelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        $announcementsHelper = Helper::where([
            ['helper_id', '=', Auth::id()],
            ['status', '!=', 'not selected'],
        ])->get();

        return view('helper.list', [
            'announcementsHelpers' => $announcementsHelper,
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
