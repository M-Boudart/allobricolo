<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Punishment;
use App\Models\Report;

class PunishmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suspendedUsers = Punishment::where('type', '=', 'suspended')->get();
        $bannedUsers = Punishment::where('type', '=', 'banned')->get();

        return view('backend.punishment.index', [
            'suspendedUsers' => $suspendedUsers,
            'bannedUsers' => $bannedUsers,
        ]);
    }

    /**
     * Punish (suspend / ban) a reported user.
     *
     * @return \Illuminate\Http\Response
     */
    public function punish(Request $request, $reportId)
    {
        $report = Report::where('id', '=', $reportId)->first();

        // Calcul de la durée / type de punition
        $nbPunishments = Punishment::where('user_id', '=', $report->object_author)
                                ->where('type', '=', 'suspended')->count();

        $from_date = time();
        $type = 'suspended';

        if ($nbPunishments == 0 ) {
            $to_date = date('Y-m-d', strtotime('+1 day', $from_date));
        } else if ($nbPunishments == 1) {
            $to_date = date('Y-m-d', strtotime('+3 day', $from_date));
        } else if ($nbPunishments == 2) {
            $to_date = date('Y-m-d', strtotime('+7 day', $from_date));
        } else {
            $to_date = null;
            $type = 'banned';
        }

        // Changement du status du report à modéré
        $updateResult = Report::where('id', $report->id)
              ->update(['status' => 'moderated']);

        // Suppression des autres reports concernant le même objet
        $otherReports = Report::select('id')
                        ->where('id', '<>', $report->id)
                        ->where('type', '=', $report->type)
                        ->where('object_id', '=', $report->object_id)
                        ->where('object_author', '=', $report->object_author)
                        ->get();
        
        foreach ($otherReports as $otherReport) {
            $deleted = Report::where('id', '=', $otherReport->id)->delete();
        }

        // Insertion de la punition
        $insertResult = Punishment::insert([
            'user_id' => $report->object_author,
            'reported_by' => Auth::id(),
            'type' => $type,
            'from_date' => date('Y-m-d', $from_date),
            'to_date' => $to_date,
            'reason' => $report->object_id,
        ]);

        if ($updateResult == false || $insertResult == false) {
            return redirect()->route('backend.punishment.index')->with('error', 'Une erreur s\'est produite lors de la suspension');
        }

        return redirect()->route('backend.punishment.index')->with('success', 'La personne a été banni avec succès');
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
}
