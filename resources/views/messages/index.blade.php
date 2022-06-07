@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ( $users as $user )
            <div class="row">
                <div class="col-2">
                    <a href="/profile/{{ $user->id }}">
                        <img src="{{ $user->profile->profileImage() }}" class="w-100 p-3 rounded-circle">
                    </a>
                </div>
                <div class="col-10 pe-3 pb-3">
                    <div class="d-flex justify-content-between">
                        <a href="/message/" class="text-dark text-decoration-none">
                            <h4>{{ $user->profile->username }}</h4>
                        </a>
                    </div>
                    <p></p>

                </div>
                <hr>
            </div>
        @endforeach


    </div>
@endsection
