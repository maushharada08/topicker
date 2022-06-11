@extends('layouts.app')

@section('content')
    <div class="container p-3">

        <div class="row">
            <div class="container">
                <div class="post p-3">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle">
                        </div>
                        <div class="col-10">
                            <div class="d-flex justify-content-between">
                                <h5>{{ $post->user->name }}</h5>
                                <p class="text-secondary">{{ $post->created_at }}</p>
                                
                            </div>
                            <p>{{ $post->message }}</p>
                            @if ($post->image)
                                <div>
                                    <img src="/storage/{{ $post->image }}" class="w-100">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <hr>


            </div>
        </div>
    </div>
@endsection
