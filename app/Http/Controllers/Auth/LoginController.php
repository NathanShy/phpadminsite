<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    public function __construct() {
        $this->middleware(['guest']);
    }
    
    public function index(){

        return view('auth.login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (!auth()->attempt ([
            $field => $request->username,
            'password' => $request->password,

            ], $request->remember) ) {
            return back()->with('status', 'Invalid Login Details');
        }

        return redirect()->route('dashboard');
    }
}
