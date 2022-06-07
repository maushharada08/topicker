<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        // $followings = auth()->user()->following()->pluck('profiles.user_id');
        // $followers = auth()->user()->profile->followers()->pluck('users.id');



        return view('messages/index' );
    }
}
