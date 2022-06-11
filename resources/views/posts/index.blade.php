@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="post-btn rounded-circle">
            <a href="/p/create" class="">
                <span class="fa-solid fa-circle-plus"></span>
            </a>
        </div>

        <div class="row">
            <div class="container">
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="post p-3">
                            <div class="row">
                                <div class="col-2">
                                    <a href="/profile/{{ $post->user->id }}">
                                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle p-3">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <div class="d-flex justify-content-between">
                                        <a href="/profile/{{ $post->user->id }}" class="text-decoration-none text-dark">
                                            <h5>{{ $post->user->name }}</h5>
                                        </a>
                                        <p class="text-secondary">{{ $post->created_at }}</p>

                                    </div>
                                    <a href="/p/{{ $post->id }}" class="text-decoration-none text-dark">
                                        <p>{{ $post->message }}</p>
                                    </a>
                                    @if ($post->topic_id)
                                        <a href="/topic/{{ $post->topic->id }}"
                                            class="text-decoration-none text-light bg-primary border-1 px-1 rounded-pill border-primary w-100">{{ $post->topic->title }}</a>
                                    @endif
                                    @if ($post->image)
                                        <div>
                                            <a href="/p/{{ $post->id }}" class="text-decoration-none text-dark">
                                                <img src="/storage/{{ $post->image }}" class="w-100">
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @else
                    <p class="text-center">まだどのトピックもフォローしていません。新しいトピックを見つけましょう</p>
                    @foreach ($data as $topic)
                        <div class="row">
                            <div class="topic p-3">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <a href="/topic/{{ $topic->id }}">
                                            <img src="/storage/{{ $topic->image }}" class="w-100 ">
                                        </a>
                                    </div>
                                    <div class="col-10 d-flex justify-content-between">
                                        <a href="/topic/{{ $topic->id }}" class="text-dark">
                                            <h3>{{ $topic->title }}</h3>

                                        </a>
                                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}">
                                        </follow-button>

                                        <p class="text-secondary">{{ $topic->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
