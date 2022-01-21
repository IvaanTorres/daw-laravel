<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleCheck
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
        $id = $request->route()->parameter('post');
        $search = Auth::user()->id === Post::find($id)->user->id; //Check de si el ID del user logged es igual al que ha creado el post
        if (auth()->user()->role === "admin" || $search){ //Válido si es admin o si es un post creado por él.
            return $next($request);
        }else{
            return redirect('/posts');
        }

    }
}
