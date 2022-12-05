<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // pengkondisian jik admin login ke dashboard dan jika owner ke data user
        if(Auth::user()->role == 'owner'){
            return redirect('user');
        }elseif(Auth::user()->role == 'admin'){
            return redirect('dashboard');
        }
    }
}
