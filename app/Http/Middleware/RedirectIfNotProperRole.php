<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotProperRole
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login');
        }

        switch ($user->role_id) {
            case 1:
                if ($request->is('admin-dashboard/*', 'admin-dashboard', 'admin-usermanagement/*', 'admin-usermanagement')) {
                    return redirect('/');
                }
                elseif($request->is('kasir-dashboard/*', 'kasir-dashboard', 'kasir-approval/*', 'kasir-approval')) {
                    return redirect('/');
                }
                elseif ($request->is('user-dashboard/*', 'user-dashboard', 'user-deposit/*', 'user-deposit', 'user-pengaduan/*', 'user-pengaduan')) {
                    return redirect('/');
                }
                break;
            case 2:
                if ($request->is('petugas-dashboard/*', 'petugas-dashboard', 'petugas-input/*', 'petugas-input')) {
                    return redirect('/');
                }
                elseif($request->is('admin-dashboard/*', 'admin-dashboard', 'admin-usermanagement/*', 'admin-usermanagement')) {
                    return redirect('/');
                }
                elseif($request->is('user-dashboard/*', 'user-dashboard', 'user-deposit/*', 'user-deposit', 'user-pengaduan/*', 'user-pengaduan')) {
                    return redirect('/');
                }
                break;
            case 3:
                if ($request->is('petugas-dashboard/*', 'petugas-dashboard', 'petugas-input/*', 'petugas-input')) {
                    return redirect('/');
                }
                elseif($request->is('kasir-dashboard/*', 'kasir-dashboard', 'kasir-approval/*', 'kasir-approval')) {
                    return redirect('/');
                }
                elseif($request->is('user-dashboard/*', 'user-dashboard', 'user-deposit/*', 'user-deposit', 'user-pengaduan/*', 'user-pengaduan')) {
                    return redirect('/');
                }
                break;
            default:
                if ($request->is('petugas-dashboard/*', 'petugas-dashboard', 'petugas-input/*', 'petugas-input')) {
                    return redirect('/');
                }
                if ($request->is('kasir-dashboard/*', 'kasir-dashboard', 'kasir-approval/*', 'kasir-approval')) {
                    return redirect('/');
                }
                if ($request->is('admin-dashboard/*', 'admin-dashboard', 'admin-usermanagement/*', 'admin-usermanagement')) {
                    return redirect('/');
                }
                break;
        }

        return $next($request);
    }
}
