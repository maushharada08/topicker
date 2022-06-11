<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TopicsController extends Controller
{
    public function index(Topic $topic, User $user)
    {
        // $topics = Topic::get();
        $follows = ( auth()->user() ) ? auth()->user()->following->contains($topic->id) :false ;
        $topics = new Topic;
        $data = $topics->latest('id')->get();
        return view('topics/index', compact('topics', 'user', 'follows', 'data'));
    }

    public function show(Topic $topic)
    {
        $follows = ( auth()->user() ) ? auth()->user()->following->contains($topic->id) :false ;
        return view('topics/show', compact('topic', 'follows'));
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(User $user)
    {
        return view('topics/create', compact('user'));
    }

    public function store(User $user)
    {
        $data = request()->validate([
            'title' => ['required', 'unique:topics'],
            'image' => ['required', 'image' ]
        ]);

        $imagePath = request('image')->store('topic', 'public');

        $image = Image::make(public_path("storage/{$imagePath}" ))->fit(800, 800);
        $image->save();

        auth()->user()->topics()->create([
            'title' => $data['title'],
            'image' => $imagePath
        ]);

        return redirect('/topic');
    }
}
