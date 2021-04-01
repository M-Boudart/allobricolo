<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\Locality;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of Announcements.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $announcements = new Collection();

        if ($request->isMethod('get')) {
            $announcements = Announcement::get();
        } else {
            $keywords = explode(' ', $request->input('keyword'));
            $category = $request->input('category');
            $locality = $request->input('locality');
           
            // Recherche par locality
            if ($locality) {
                $locationCollection = Announcement::where('locality_id', '=', $locality)->get();
                
                $announcements = $announcements->concat($locationCollection);
            }

            // Recherche par keywords
            if (strlen($keywords[0]) > 0) {
                $keywordsCollection = new Collection();

                foreach ($keywords as $keyword) {
                    $keywordsCollection = $keywordsCollection->concat(
                        Announcement::where('description', 'like', "%$keyword%")
                                        ->orWhere('title', 'like', "%$keyword%")
                                        ->get()
                    );
                }

                $keywordsCollection = $keywordsCollection->unique();

                $announcements = $announcements->concat($keywordsCollection);
            }

            // Recherche par categories
            if ($category) {
                $categoryCollection = new Collection();
                
                $announcementIds = DB::table('announcement_categories')
                                    ->select('announcement_id')
                                    ->where('category_id', '=', $category)
                                    ->get();
                
                foreach ($announcementIds as $announcementId) {
                    $categoryCollection = $categoryCollection->concat(
                        Announcement::where('id', '=', $announcementId->announcement_id)->get()
                    );
                }

                $announcements = $announcements->concat($categoryCollection);
            }

            $announcements = $announcements->unique();
        }
        
        // Recherche des categories et localities pour les champs de formulaire
        $categories = Category::get();
        $localities = Locality::get();

        return view('announcement.index', [
            'announcements' => $announcements,
            'categories' => $categories,
            'localities' => $localities,
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
