@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="row align-items-center">
            <div class="col-1 fs-3">
                <a href="/topic"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="col-2">
                <img src="/storage/{{ $topic->image }}" class="w-100 ">
            </div>
            <div class="col-9 d-flex align-items-center justify-content-between">
                <div class="d-flex">
                    <h3 class="pe-2">{{ $topic->title }}</h3>
                    <follow-button topic-id="{{ $topic->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                <p class="ps-2"><strong>{{ $topic->followers->count() }}</strong> ピッカー</p>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <a href="/p/create"><button class="btn btn-primary">New messsage</button></a>
        </div>
        <hr>

        @forelse ($topic->posts as $post)
            <div class="post p-3">
                <div class="row">
                    <div class="col-2">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle">
                    </div>
                    <div class="col-10">
                        <div class="d-flex justify-content-between">
                            <h5>{{ $post->user->name }}</h5>
                            <div class="d-flex align-items-center">
                                <p class="text-secondary">{{ $post->created_at }}</p>
                                <!-- Default dropstart button -->
                                <div class="btn-group dropstart">
                                    <i class="ms-3 py-0 fa-solid fa-ellipsis-vertical btn btn-secondary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu">
                                        @can('update', $post->user->profile)
                                            <!-- Dropdown menu links -->
                                            <form class="delete" method="post" action="/p/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="削除"
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
        @empty
            <p class="text-center">Let's yeild first message!</p>
        @endforelse


    </div>
@endsection
