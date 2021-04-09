<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
        $localities = DB::table('localities')->get();
        $categories = DB::table('categories')->get();

        return view('announcement.create', [
            'localities' => $localities,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'address' => 'required|max:60',
            'locality_id' => 'required|Numeric|min:1|max:19',
            'price' => 'required|Numeric|min:0',
            'description' => 'nullable|max:65535',
            'phone' => 'required|max:20',
            'pictures' => 'nullable|Array',
            'categories' => 'required|Array',
        ]);

        // Récupération des inputs 
        $announcementInfos = $request->all();
        $categoriesInput = $request->categories;

        // Formatage des inputs afin de les inserés dans la bdd
        $announcementInfos['created_at'] = date('Y-m-d H:i:s');
        $announcementInfos['applicant_user_id'] = Auth::id();
        unset($announcementInfos['_token']); 
        unset($announcementInfos['categories']);

        $result = DB::table('announcements')->insert($announcementInfos);

        if ($result) {
            $categoryInfos = [];

            $announcementId = Announcement::select('id')
                                    ->orderBy('created_at', 'Desc')
                                    ->limit(1)
                                    ->get()
                                    ->toArray()[0]['id'];

            foreach ($categoriesInput as $category) {
                $categoryId = DB::table('categories')
                                ->select('id')
                                ->where('category', '=', $category)
                                ->get()
                                ->toArray()[0]->id;
                
                $categoryInfos['announcement_id'] = $announcementId;
                $categoryInfos['category_id'] = $categoryId;

                $result = DB::table('announcement_categories')->insert($categoryInfos);

                if (!$result) break;
            }
        }

        if ($result) {
            return redirect()->route('announcement.index')->with('success', 'Votre annonce vient d\'être ajoutée à la lsite des annnonces');
        } else {
            return redirect()->route('announcement.index')->with('error', 'Une erreur s\'est produite lors de la création de votre annonce, veuillez réessayer plustard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcement = Announcement::find($id);

        // dd($announcement->pictures->toArray()[0]['picture_url']);
        return view('announcement.show', [
            'announcement' => $announcement,
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
