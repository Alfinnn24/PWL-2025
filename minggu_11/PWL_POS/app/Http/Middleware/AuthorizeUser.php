<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $role): Response
    {

        // $user = $request->user();

        // if ($user->hasRole($role)) {
        //     return $next($request);
        // }

        $user_role = $request->user()->getRole();               //digunakan untuk mengambil data level_kode dari user saat login
        if (in_array($user_role, $role)) {   //memeriksa apakah level_kode user saat login ada dalam array $roles
            return $next($request);                             //jika ada, maka jalankan $next
        }

        //jika tidak punya role, maka tampilkan pesan error 403
        abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
    }
}
