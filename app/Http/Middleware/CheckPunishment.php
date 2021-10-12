<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Punishment;

class CheckPunishment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('email', '=', $request->email)->get();

        if (sizeof($user) > 0) {
            $banned = Punishment::where([
                ['user_id', '=', $user[0]->id],
                ['type', '=', 'banned'],
            ])->exists();
        
            if ($banned) {
                return redirect()->route('welcome')->with('error', 'Vous avez été banni par nos modérateurs à durée indéterminée! Vous avez reçu un mail lors de votre bannissement dans lequel vous retrouvez la procédure pour introduire une demande de fin de bannissement.');
            }

            $suspended = Punishment::where([
                ['user_id', '=', $user[0]->id],
                ['type', '=', 'suspended'],
                ['to_date', '>=', date('Y-m-d')],
            ])->exists();

            if ($suspended) {
                return redirect()->route('welcome')->with('error', 'Vous êtes suspendu, réessayez de vous connecter dans quelques jours ou consultez vos mails afin de faire une demande de fin de suspension');
            }
        }

        return $next($request);
    }
}
