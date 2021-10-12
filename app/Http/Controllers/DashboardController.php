<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('announcement_categories')
            ->join('categories', 'categories.id', '=', 'announcement_categories.category_id')
            ->select('categories.category', DB::raw('count(*) as number'))
            ->groupBy('categories.category')
            ->get()->toArray();

        return view('backend.dashboard', [
            'datas' => $datas,
        ]);
    }
}
