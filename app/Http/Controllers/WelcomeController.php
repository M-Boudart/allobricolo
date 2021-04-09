<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Announcement;

class WelcomeController extends Controller
{
    /**
     * Display the welcome page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latestAnnouncements = Announcement::whereNull('realised_at')
                                ->orderBy('created_at', 'desc')
                                ->limit(3)
                                ->get();

        return view('welcome', [
            'latestAnnouncements' => $latestAnnouncements,
        ]);
    }
}
