@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <div class="d-flex justify-content-between">
            <div class="col-1 fs-3">
                <a href="/"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="text-center">
                <a href="/topic/create"><button class="btn btn-primary">New Topic</button></a>
            </div>
            <div></div>

        </div>

        <div class="post-btn rounded-circle">
            <a href="/p/create" class="">
                <span class="fa-solid fa-circle-plus"></span>
            </a>
        </div>


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
                            <div class="d-flex">
                                <follow-button topic-id="{{ $topic->id }}" follows="{{ $follows }}"></follow-button>
                                <p class="ms-2 text-secondary">{{ $topic->created_at }}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>

            </div>
        @endforeach

    </div>
@endsection
