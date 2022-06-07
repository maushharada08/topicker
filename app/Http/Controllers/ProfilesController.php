<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = ( auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles/index', compact('user', 'follows'));
    }

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles/edit', compact('user'));
    }

    public function edit_p_image(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles/edit_p_image', compact('user'));
    }

    public function edit_logo(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles/edit_logo', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'com_name' => '',
            'occupation' => 'required',
            'username' => 'required',
            'username_sm' => '',
            'p_code' => '',
            'adress' => '',
            'email' => ['required', 'email'],
            'tel' => ['nullable', 'numeric'],
            'url' => ['nullable', 'url'],
            'tw' => ['nullable', 'url'],
            'fb' => ['nullable', 'url'],
            'in' => ['nullable', 'url'],
            'yt' => ['nullable', 'url'],
        ]);

        $data['user_id'] = $user->id ;

        auth()->user()->profile->update(array_merge(
            $data,
        ));

        return redirect("/profile/{$user->id}" );

    }

    public function update_p_image(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'image' => ['nullable', 'image'],
        ]);

        if (request('image')){
            $imagePath = request('image')->store('profiles', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
            $image->save();

            $imageArray = [ 'image' => $imagePath ];
        }

        auth()->user()->profile->update(array_merge(
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}" );
    }

    public function update_logo(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'logo' => ['nullable', 'image'],
        ]);

        if (request('logo')){
            $logoPath = request('logo')->store('logos', 'public');

            $image = Image::make(public_path("storage/{$logoPath}"))->fit(800, 200);
            $image->save();

            $logoArray = [ 'logo' => $logoPath ];
        }

        auth()->user()->profile->update(array_merge(
            $logoArray ?? [],
        ));

        return redirect("/profile/{$user->id}" );
    }
}
