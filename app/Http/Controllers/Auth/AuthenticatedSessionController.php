<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $redirectTo = request()->redirectTo;
        $get_user = User::where('email', $request->email)->first()->toArray();

        if (!empty($get_user)) {
            Session::put('user_id', $get_user['id']);
            Session::put('email', $get_user['email']);
            Session::put('first_name', $get_user['first_name']);
            Session::put('last_name', $get_user['last_name']);
            Session::put('name', $get_user['name']);
            Session::put('user_role', $get_user['user_role']);
            Session::put('status', $get_user['status']);
        }
        // $sessions=Session::all();
        // dd($sessions);
        return redirect('admin/dashboard');
        // if ($redirectTo) {
        //     return redirect($redirectTo);
        // } else {
        //     return redirect(RouteServiceProvider::HOME);
        // }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
