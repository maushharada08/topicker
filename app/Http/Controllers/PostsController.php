<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('posts/show', compact('post'));
    }

    public function search()
    {
        $keyword = request()->input('keyword');
        $query = Post::query();
        $query_topic = Topic::query();
        $query_user = User::query();
        $query_profile = Profile::query();

        if(!empty($keyword)) {
            $query->where('message', 'LIKE', "%{$keyword}%");
                // ->orWhere('name', 'LIKE', "%{$keyword}%");
        }

        if(!empty($keyword)) {
            $query_topic->where('title','LIKE', "%{$keyword}%");
        }

        if(!empty($keyword)) {
            $query_user->where('name','LIKE', "%{$keyword}%");
            // $query_profile->where('bio', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->get();
        $topics = $query_topic->get();
        $users = $query_user->get();
        return view('posts/search', compact('keyword', 'query', 'posts', 'topics', 'users'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user, Topic $topic)
    {

        $users = auth()->user()->following()->pluck('topics.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(10);

        $topics = new Topic;
        $data = $topics->latest('id')->get();
        $follows = ( auth()->user() ) ? auth()->user()->following->contains($topic->id) :false ;

        return view('posts/index', compact('user', 'posts', 'follows', 'topics', 'data', 'topic'));
    }

    public function create(User $user)
    {
        $topic = new Topic;
        $topics = $topic->getLists()->prepend('選択', '');
        return view('posts/create', compact('user', 'topics'));
    }

    public function store(User $user)
    {
        dd(request());

        $data = request()->validate([
            'message' => 'required',
            'image' => 'image',
            'topic_id' => ''
        ]);

        if (request('image')){
            $imagePath = request('image')->store('uploads', 'public');

            // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            // $image->save();

            $imageArray = [ 'image' => $imagePath ];

        }

        auth()->user()->posts()->create(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/" . auth()->user()->id );

    }

    public function destroy(Post $post)
    {
        $post = Post::find($post->id);
        $post->delete();
        return redirect('/profile/' . auth()->user()->id )->with('success', '投稿を削除しました');
    }
}
