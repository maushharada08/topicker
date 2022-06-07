@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($post)
            <div class="row">
                <div class="col-2">
                    <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 p-3 rounded-circle">
                    </a>
                </div>
                <div class="col-10 pe-3 pb-3">
                    <div class="d-flex justify-content-between">
                        <a href="/profile/{{ $post->user->id }}" class="text-dark text-decoration-none">
                            <h4>{{ $post->user->profile->username }}</h4>
                        </a>
                        <p class="text-secondary">{{ $post->created_at }}</p>
                    </div>
                    <p>{{ $post->message }}</p>
                    @if ($post->image)
                        <div class="border-1">
                            <img src="/storage/{{ $post->image }}" class="w-75">
                        </div>
                    @endif

                </div>
                <hr>
            </div>
        @else
            <p>投稿はありません</p>
        @endif


    </div>
@endsection
