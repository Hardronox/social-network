<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $user= User::with('profile')->where('slug',$slug)->first();

        return view('profiles.profile',[
            'user'=>$user
        ]);
    }
}
