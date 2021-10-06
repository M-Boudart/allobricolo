<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\User;
use App\Models\Review;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendingReports = Report::where('status', '=', 'pending')->orderBy('reported_at', 'desc')->paginate(5);

        return view('backend.report.index', [
            'pendingReports' => $pendingReports,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type, $objectId)
    {

        $validated = $request->validate([
            'reason' => 'required|max:100000',
        ]);
        
        if ($type === 'announcements') {
            $objectType = 'announcement';
            $reportedObject = Announcement::where('id', '=', $objectId)->first();
            $objectAuthor = $reportedObject->applicant->id;
        } else if ($type === 'profile') {
            $objectType = 'profile';
            $reportedObject = User::where('id', '=', $objectId)->first();
            $objectAuthor = $reportedObject->id;
        } else {
            $objectType = 'review';
            $reportedObject = Review::where('id', '=', $objectId)->first();
            // TODO Sélectionner l'auteur de la review
        }

        $inserted = Report::insert([
            'status' => 'pending',
            'type' => $objectType,
            'object_id' => $objectId,
            'object_author' => $objectAuthor,
            'reported_by' => Auth::id(),
            'description' => $request->reason,
            'reported_at' => date('Y-m-d'),
        ]);

        if (!$inserted) {
            return redirect()->route('announcement.index')->with('error', 'Une erreur est survenue lors du signalement, veuillez réessayer plustard');
        }

        return redirect()->route('announcement.index')->with('success', 'Votre signalement a bien été envoyé. Un modérateur va bientôt s\'en occuper');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Report::where('id', '=', $id)->delete();

        if ($deleted) {
            return redirect()->route('backend.report.index')->with('success', 'Le signalement a bien été supprimé');
        }

        return redirect()->route('backend.report.index')->with('error', 'Erreur lors de la suppression du signalement');
    }
}
