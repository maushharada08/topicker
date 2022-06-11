@extends('layouts.app')

@section('content')
    <div class="container px-3">

        <div class="row">
            <div class="mb-3">
                <form action="/search" method="GET">
                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-control rounded-pill"
                        placeholder="search Topicker">
                    {{-- <input type="submit" value="検索"> --}}
                </form>


            </div>

            <div class="tab_box pb-5">
                <div class="btn_area">
                    <p class="tab_btn active">メッセージ</p>
                    <p class="tab_btn">トピック</p>
                    <p class="tab_btn">ユーザー</p>
                </div>
                <div class="panel_area">
                    <div class="tab_panel active">
                        <div class="result row">
                            @forelse ($posts as $post)
                                <div class="col-2">
                                    <a href="/profile/{{ $post->user->id }}">
                                        <img src="{{ $post->user->profile->profileImage() }}"
                                            class="w-100 rounded-circle">
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
                                            <img src="/storage/{{ $post->image }}" class="w-100">
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div>No Result!!</div>
                            @endforelse



                        </div>
                    </div>
                    <div class="tab_panel">
                        <div class="result row">
                            @forelse ($topics as $topic)
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
                                                <p class="text-secondary">{{ $topic->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                            @empty
                                <div>No Result!!</div>
                            @endforelse



                        </div>
                    </div>
                    <div class="tab_panel">
                        <div class="result row">
                            @forelse ($users as $user)
                                <div class="col-2">
                                    <a href="/profile/{{ $user->id }}">
                                        <img src="{{ $user->profile->profileImage() }}" class="w-100 rounded-circle">
                                    </a>
                                </div>
                                <div class="col-10">
                                    <div class="d-flex justify-content-between">
                                        <a href="/profile/{{ $user->id }}" class="text-decoration-none text-dark">
                                            <h5>{{ $user->name }}</h5>
                                        </a>
                                    </div>
                                    <a href="/profile/{{ $user->id }}" class="text-decoration-none text-dark">
                                        <p>{{ $user->profile->bio }}</p>
                                    </a>

                                </div>
                            @empty
                                <div>No Result!!</div>
                            @endforelse



                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
