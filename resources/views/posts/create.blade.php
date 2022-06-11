@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('New Post') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/p" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="message"
                                    class="col-md-3 col-form-label text-md-end">{{ __('message') }}</label>

                                <div class="col-md-9">
                                    <input id="message" type="text"
                                        class="form-control @error('message') is-invalid @enderror" name="message"
                                        value="{{ old('message') }}" autocomplete="message" autofocus>

                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-3 col-form-label text-md-end">{{ __('image') }}</label>

                                <div class="col-md-9">
                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image" class="col-md-3 col-form-label text-md-end">カテゴリ</label>
                                <div class="col-md-9">
                                    <select
                                        id="topic_id"
                                        name="topic_id"
                                        class="form-control {{ $errors->has('topic_id') ? 'is-invalid' : '' }}"
                                        value="{{ old('topic_id') }}">
                                        @foreach ($topics as $id => $topic)
                                            <option value="{{ $id }}">{{ $topic }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-9">
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Post') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
