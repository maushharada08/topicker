<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles/index', compact('user'));
    }

    public function find(Topic $topic)
    {
        $follows = ( auth()->user() ) ? auth()->user()->following->contains($topic->id) :false ;
        $topics = new Topic;
        $data = $topics->latest('created_at')->get();
        return view('profiles/find', compact('topics', 'data', 'follows'));
    }



    public function edit(User $user)
    {
        $this->authorize('update', $user->profile );

        return view('profiles/edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile );

        $data = request()->validate([
            'bio' => 'required',
            'image' => 'image'
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }


        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}" );

    }
}
