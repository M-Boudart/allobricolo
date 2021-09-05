<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Category;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderedUsers = [];
        $arrStatus = DB::table('status')->orderBy('id', 'asc')->get();

        foreach ($arrStatus as $status) {
            $orderedUsers [$status->status] = User::where('status_id', '=', $status->id)
                                                ->get();
        }

        return view('backend.user.index', [
            'groupedUsers' => $orderedUsers,
        ]);
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
        $announcements = $user->announcements->whereNull('realised_at');
        
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
            'announcements' => $announcements,
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
        if (Auth::id() != $id) {
            return redirect()->route('user.show', $id);
        }

        $user = User::find($id);
        $categories = Category::get();

        return view('user.edit', [
            'user' => $user,
            'categories' => $categories,
        ]);
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
        $validated = $request->validate([
            'lastname' => 'nullable|max:60|alpha',
            'firstname' => 'nullable|max:60|alpha',
            'login' => 'nullable|max:30|unique:users',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|min:8',
            'email' => 'nullable|email:rfc|max:255|unique:users',
            'description' => 'nullable|max:65535',
            'picture' => 'file|image|nullable',
        ]);

        // Lorsque le mot de passe est modifié
        if ($request->input('password') !== null) {
            $validated = $request->validate([
                'password' => 'required|confirmed',
                'password_confirmation' => 'required|min:8|same:password',
            ]);
        }

        $user = User::find($id);
        $inputs = $request->all();
        $userInfos = [];

        if (isset($inputs['knowledges'])) {
            $knowledges = [];

            foreach ($inputs['knowledges'] as $knowledge) {
                $knowledges[] = [
                    'user_id' => Auth::id(),
                    'category_id' => $knowledge,
                ];
            }

            DB::table('knowledges')->insert($knowledges);

            unset($inputs['knowledges']);
        }

        // Lorsqu'il y a une photo de profil
        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');

            $path = $picture->store('img/users');
            $path = explode('/', $path);
            $url = $path[2];
            
            if ($user->avatar !== null) {
                Storage::delete('img/users/' . $user->avatar);
            }
        }

        unset($inputs['_token']);
        unset($inputs['_method']);
        unset($inputs['password_confirmation']);
        unset($inputs['MAX_FILE_SIZE']);

        foreach ($inputs as $key => $value) {
            if (!empty($value)) {
                if ($key === 'password') {
                    $userInfos[$key] = Hash::make($value);
                } else if ($request->hasFile('picture') && $key ==='picture') {
                    $userInfos['avatar'] = $url;
                } else {
                    $userInfos[$key] = $value;
                }
            }
        }

        $result = $user->where('id', '=', $user->id)
            ->update($userInfos);

        if ($result) {
            return redirect()->route('user.show', $user->id)->with('success', 'Votre profil a bien été modifié !');
        } else {
            return redirect()->route('user.show', $user->id)->with('error', 'Une erreur s\'est produite lors de la modification, veuillez réessayer plustard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::id() != $id) {
            return redirect()->route('user.show', $id);
        }

        $user = User::find($id);

        $result = User::where('id', '=', $id)->delete();

        if ($result) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('welcome')->with('success', 'Vous avez supprimé votre compte, aurevoir !');
        }
    }

    /**
     * Promote a member as admin or moderator.
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function promote (Request $request, $userId) {
        $validator = $request->validate([
            'status' => 'required|exists:status'
        ]);

        if ($request->status == 'admin') {
            $newStatus = DB::table('status')->select('id')
                            ->where('status', '=', 'Admin')
                            ->get()[0]->id;
        } else {    
            $newStatus = DB::table('status')->select('id')
                            ->where('status', '=', 'Modérateur')
                            ->get()[0]->id;
        }
        
        $updated = User::where('id', '=', $userId)->update(['status_id' => $newStatus]);

        if ($updated) {
            return redirect()->route('backend.user.index')->with('success', 'Le membre a été promu !');
        }

        return redirect()->route('backend.user.index')->with('error', 'Une erreur s\'est produit lors de la promotion.');
    }
}
