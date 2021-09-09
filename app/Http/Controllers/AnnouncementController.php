<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use App\Models\Announcement;
use App\Models\Category;
use App\Models\Locality;
use App\Models\AnnouncementPicture;
use App\Models\Helper;
use App\Models\ChMessage;

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
        if ($request->hasFile('pictures')) { unset($announcementInfos['pictures']); }

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

            // Gestion de l'upload d'image
            if ($request->hasFile('pictures')) {
                $pictures = $request->pictures;
                
                if (sizeof($pictures) <= 3) {
                    $pictureExtensions = ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'svg', 'webp'];
                    
                    foreach ($pictures as $picture) {
                        $extension = $picture->extension();
    
                        if (!in_array($extension, $pictureExtensions)) {
                            return redirect()->route('announcement.create')->with('error', 'Les fichiers que vous avez fournis doivent être des images');
                        }
                        
                        $path = $picture->store('img/announcements');
                        $path = explode('/', $path);
                        $url = $path[2];
                        
                        $result = DB::table('announcement_pictures')->insert([
                            'announcement_id' => $announcementId,
                            'picture_url' => $url,
                        ]);

                        if (!$result) break;
                    }
                }
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
     * @param  int  $announcementId
     * @return \Illuminate\Http\Response
     */
    public function edit($announcementId)
    {
        $announcement = Announcement::find($announcementId);

        if (Auth::id() != $announcement->applicant->id) {
            return redirect()->route('announcement.show', $id);
        }

        $categories = Category::get();
        $localities = Locality::get();

        return view('announcement.edit', [
            'announcement' => $announcement,
            'categories' => $categories,
            'localities' => $localities,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $announcementId)
    {
        $validated = $request->validate([
            'title' => 'nullable|max:100',
            'address' => 'nullable|max:60',
            'locality_id' => 'nullable|Numeric|min:1|max:19',
            'price' => 'nullable|Numeric|min:0',
            'description' => 'nullable|max:65535',
            'phone' => 'nullable|max:20',
            'pictures' => 'nullable|Array',
            'categories' => 'nullable|Array',
        ]);

        $announcement = Announcement::find($announcementId);
        $inputs = $request->all();
        $announcementInfos = [];

        if (isset($inputs['categories'])) {
            $categories = [];

            foreach ($inputs['categories'] as $category) {
                $categories[] = [
                    'announcement_id' => $announcementId,
                    'category_id' => $category,
                ];
            }

            DB::table('announcement_categories')->insert($categories);

            unset($inputs['categories']);
        }

        //TODO Photo

        unset($inputs['_token']);
        unset($inputs['_method']);
        unset($inputs['MAX_FILE_SIZE']);

        foreach ($inputs as $key => $value) {
            if (!empty($value)) {
                $announcementInfos[$key] = $value;
            }
        }

        $result = $announcement->where('id', '=', $announcement->id)->update($announcementInfos);

        if ($result) {
            return redirect()->route('announcement.show', $announcement->id)->with('success', 'L\'annonce a bien été modifié !');
        } else {
            return redirect()->route('announcement.show', $announcement->id)->with('error', 'Une erreur s\'est produite lors de la modification, veuillez réessayer plustard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcement = Announcement::find($id);

        if (Auth::id() != $announcement->applicant_user_id) {
            return redirect()->route('announcement.show', $announcement->id)->with('error', 'Vous n\'êtes pas autorisé à supprimer cette annonce !');
        }

        $result = Announcement::where('id', '=', $announcement->id)->delete();

        if ($result) {
            return redirect()->route('user.show', $announcement->applicant_user_id)->with('success', 'Vous avez');
        }
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
                'chat_id' => 0
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
     * List all the announcement of the connected user.
     *
     * @return \Illuminate\Http\Response
     */
    public function list() {
        $announcements = Announcement::where('applicant_user_id', '=', Auth::id())->get();

        return view('announcement.list', [
            'announcements' => $announcements,
        ]);
    }
}
