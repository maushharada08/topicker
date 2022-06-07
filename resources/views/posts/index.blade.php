@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($posts)
            @foreach ($posts as $post)
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
                        <a href="/p/{{ $post->id }}" class="text-dark text-decoration-none">
                            <p>{{ $post->message }}</p>
                        </a>
                        @if ($post->image)
                            <a href="/p/{{ $post->id }}" class="text-dark text-decoration-none">
                                <div class="border-1">
                                    <img src="/storage/{{ $post->image }}" class="w-75">
                                </div>
                            </a>
                        @endif

                    </div>
                    <hr>
                </div>
            @endforeach
        @else
            <p>ユーザーをフォローして最新の投稿を発見しましょう！</p>
        @endif
        <div class="text-center mb-5 mx-auto d-flex justify-content-center">
            <div>
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>
@endsection
