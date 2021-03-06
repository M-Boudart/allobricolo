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
            return redirect()->route('welcome')->with('error', 'Vous n\'??tes pas l\'auteur de cette annonce');
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
                    ->subject('Vous avez ??t?? selectionner pour une annonce');
        });

        return redirect()->route('announcement.show', $announcementId)->with('success', 'Vous avez bien selectionner le bricoleur');
    }
}
