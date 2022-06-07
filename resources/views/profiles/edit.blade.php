@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 pb-5">
            <div class="card">
                <div class="card-header">{{ __('名刺を編集') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3">
                            <label for="com_name" class="col-md-2 col-form-label text-md-end">{{ __('会社名') }}</label>

                            <div class="col-md-10">
                                <input id="com_name" type="text" class="form-control @error('com_name') is-invalid @enderror" name="com_name" value="{{ $user->profile->com_name ?? old('com_name') }}" autocomplete="com_name" autofocus/>

                                @error('com_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="occupation" class="col-md-2 col-form-label text-md-end">{{ __('職種') }}</label>

                            <div class="col-md-10">
                                <input id="occupation" type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ $user->profile->occupation ?? old('occupation') }}" autocomplete="occupation" autofocus/>

                                @error('occupation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-2 col-form-label text-md-end">{{ __('表示名') }}</label>

                            <div class="col-md-10">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ??  $user->profile->username }}" autocomplete="username" autofocus/>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username_sm" class="col-md-2 col-form-label text-md-end">{{ __('表示名（サブ）') }}</label>

                            <div class="col-md-10">
                                <input id="username_sm" type="text" class="form-control @error('username_sm') is-invalid @enderror" name="username_sm" value="{{ old('username_sm') ?? $user->profile->username_sm }}" autocomplete="username_sm" autofocus/>

                                @error('username_sm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="p_code" class="col-md-2 col-form-label text-md-end">{{ __('郵便番号') }}</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="p_code" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','adress','adress');" value="{{ old('p_code') ?? $user->profile->p_code }}">
                                @error('p_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="adress" class="col-md-2 col-form-label text-md-end">{{ __('住所') }}</label>

                            <div class="col-md-10">
                                <input type="text" class="form-control" name="adress" size="60" value="{{ $user->profile->adress ?? old('adress') }}">
                                @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-2 col-form-label text-md-end">{{ __('E-mail') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->profile->email }}" autocomplete="email" autofocus/>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tel" class="col-md-2 col-form-label text-md-end">{{ __('Tel') }}</label>

                            <div class="col-md-10">
                                <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') ?? $user->profile->tel }}" autocomplete="tel" autofocus/>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="url" class="col-md-2 col-form-label text-md-end">{{ __('Webサイト') }}</label>

                            <div class="col-md-10">
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ??  $user->profile->url }}" autocomplete="url" autofocus/>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tw" class="col-md-2 col-form-label text-md-end">{{ __('Twitter URL') }}</label>

                            <div class="col-md-10">
                                <input id="tw" type="url" class="form-control @error('tw') is-invalid @enderror" name="tw" value="{{ old('tw') ?? $user->profile->tw }}" autocomplete="tw" autofocus/>

                                @error('tw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fb" class="col-md-2 col-form-label text-md-end">{{ __('Facebook URL') }}</label>

                            <div class="col-md-10">
                                <input id="fb" type="url" class="form-control @error('fb') is-invalid @enderror" name="fb" value="{{ old('fb') ?? $user->profile->fb }}" autocomplete="fb" autofocus/>

                                @error('fb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="in" class="col-md-2 col-form-label text-md-end">{{ __('Instagram URL') }}</label>

                            <div class="col-md-10">
                                <input id="in" type="url" class="form-control @error('in') is-invalid @enderror" name="in" value="{{ old('in') ?? $user->profile->in  }}" autocomplete="in" autofocus/>

                                @error('in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="yt" class="col-md-2 col-form-label text-md-end">{{ __('YouTube URL') }}</label>

                            <div class="col-md-10">
                                <input id="yt" type="url" class="form-control @error('yt') is-invalid @enderror" name="yt" value="{{ old('yt') ??  $user->profile->yt }}" autocomplete="yt" autofocus/>

                                @error('yt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-10 offset-md-4">
                                <button class="btn btn-primary">
                                    {{ __('保存') }}
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
