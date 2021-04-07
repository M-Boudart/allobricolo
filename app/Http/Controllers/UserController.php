<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\User;

class UserController extends Controller
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
     * Affiche la liste des bricoleurs.
     *
     * @return \Illuminate\Http\Response
     */
    public function workers () {
        $workersCollections = new Collection();

        $workersId = DB::table('knowledges')->select('user_id')
                        ->distinct()->get();

        foreach ($workersId as $worker) {
            $workersCollections = $workersCollections->concat(
                User::where('id', '=', $worker->user_id)->get()
            );
        }

        return view('user.workers', [
            'workers' => $workersCollections
        ]);
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
        $reviews = new Collection();
        $user = User::find($id);
        $announcementRealised = DB::table('helpers')->select('announcement_id as id')
                                    ->where('helper_id', '=', $id)
                                    ->where('status', '=', 'selected')
                                    ->get();  

        if (!empty($announcementRealised)) {
            foreach($announcementRealised as $announcement) {
                $reviews = $reviews->concat(
                    DB::table('reviews')->where('announcement_id', $announcement->id)->get()
                );
            }
        }

        return view('user.show', [
            'user' => $user,
            'nbAnnouncementRealised' => $announcementRealised->count(),
            'reviews' => $reviews,
        ]);
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
}
