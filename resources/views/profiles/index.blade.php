@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="post-btn rounded-circle">
            <a href="/p/create" class="">
                <span class="fa-solid fa-circle-plus"></span>
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col-sm-4">
                <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">
            </div>
            <div class="col-sm-8">
                <h3>{{ $user->name }}</h3>
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">
                        <button class="btn btn-secondary">Edit Profile</button>
                    </a>
                @endcan

            </div>
            <div class="col-sm-12">
                <p>bio</p>
                <p>{{ $user->profile->bio }}</p>
                <div class="d-flex align-items-center">
                    <p><strong>{{ $user->posts->count() }}</strong> 投稿</p>
                    <p class="ps-2"><strong>{{ $user->following->count() }}</strong> ピック</p>
                    @foreach ($user->following as $f_topic)
                        <a href="/topic/{{ $f_topic->id }}"
                            class="text-decoration-none text-light bg-primary border-1 px-1 py-1 m-1 rounded-pill border-primary">{{ $f_topic->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="container">
                @foreach ($user->posts as $post)
                    <div class="post p-3">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">
                            </div>
                            <div class="col-10">
                                <div class="d-flex justify-content-between">
                                    <h5>{{ $user->name }}</h5>
                                    <div class="d-flex align-items-center">
                                        <p class="text-secondary">{{ $post->created_at }}</p>
                                        <!-- Default dropstart button -->
                                        <div class="btn-group dropstart">
                                            <i class="ms-3 py-0 fa-solid fa-ellipsis-vertical btn btn-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                @can('update', $user->profile)
                                                    <!-- Dropdown menu links -->
                                                    <form class="delete" method="post" action="/p/{{ $post->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input class="text-danger border-0 bg-light" type="submit" value="削除"
                                                            onclick='return confirm("削除しますか？");'>
                                                    </form>
                                                @endcan

                                            </ul>
                                        </div>

                                    </div>

                                </div>
                                <a href="/p/{{ $post->id }}" class="text-decoration-none text-dark">
                                    <p>{{ $post->message }}</p>
                                </a>
                                <div class="d-inline">
                                    @if ($post->topic_id)
                                        <a href="/topic/{{ $post->topic->id }}"
                                            class="text-decoration-none text-light bg-primary border-1 px-1 rounded-pill border-primary w-100">{{ $post->topic->title }}</a>
                                    @endif
                                </div>

                                <a href="/p/{{ $post->id }}" class="text-decoration-none text-dark">
                                    @if ($post->image)
                                        <div>
                                            <img src="/storage/{{ $post->image }}" class="w-100">
                                        </div>
                                    @endif
                                </a>


                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach


            </div>
        </div>
    </div>
@endsection
