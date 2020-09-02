<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function authProfile(){
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'adrianradores')->first();
        $auth = $profile->getInstagramAuthUrl();

        return view('welcome', ['auth' => $auth]);

    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
