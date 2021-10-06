<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $suspendedUsers = Punishment::where('type', '=', 'suspended')->orderBy('to_date', 'desc')->paginate(
                                $perPage = 5, $columns = ['*'], $pageName = 'suspendedUsers'
                            );
        $bannedUsers = Punishment::where('type', '=', 'banned')->orderBy('from_date', 'desc')->paginate(
                                $perPage = 5, $columns = ['*'], $pageName = 'banned'
                            );
        $unBannedUsers = Punishment::where('type', '=', 'unbanned')->orderBy('to_date', 'desc')->paginate(
                                $perPage = 5, $columns = ['*'], $pageName = 'banned'
                            );

        return view('backend.punishment.index', [
            'suspendedUsers' => $suspendedUsers,
            'bannedUsers' => $bannedUsers,
            'unBannedUsers' => $unBannedUsers,
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

        $infos = [
            'user_id' => $report->object_author,
            'reported_by' => Auth::id(),
            'type' => $type,
            'from_date' => date('Y-m-d', $from_date),
            'to_date' => $to_date,
            'reason' => $reportId,
        ];

        // Insertion de la punition
        $insertResult = Punishment::insert($infos);

        if ($updateResult == false || $insertResult == false) {
            return redirect()->route('backend.punishment.index')->with('error', 'Une erreur s\'est produite lors de la suspension');
        }

        Mail::send('emails.punish', ['infos' => $infos, 'report' => $report],
        function($message) use ($infos, $report) {
            $message->from('allobricolo@moderation.com', 'Allobricolo Moderation');
            $message->to($report->whoHasBeenReported->email, $report->whoHasBeenReported->firstname)
                    ->subject('Vous avez été sanctionné par un modérateur');
        });
        
        return redirect()->route('backend.punishment.index')->with('success', 'La personne a été banni avec succès');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stopPunishment(Request $request, $punishmentId)
    {
        $punishment = Punishment::where('id', '=', $punishmentId)->first();

        if ($request->type === 'ban') {
            $updatedFields = [
                'to_date' => date('Y-m-d'),
                'type' => 'unbanned',
            ];
        } else {
            $updatedFields = [
                'to_date' => date('Y-m-d'),
            ];
        }

        $updated = Punishment::where('id', '=', $punishment->id)
                                ->update($updatedFields);

        if ($updated == false) {
            return redirect()->route('backend.punishment.index')->with('error', 'Une erreur s\'est produite, réessayez plustard');
        }

        return redirect()->route('backend.punishment.index')->with('success', 'La suspension a bien été levée');
    }
}
