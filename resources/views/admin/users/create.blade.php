@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Add User</h1>

        <form action="/admin/users" method="post" class="w-100">
            @csrf

            <div class="form-group row col-md-6">
                <label for="name">{{ __('Name') }}</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="username">{{ __('Username') }}</label>

                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="email">{{ __('Email') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" autocomplete="password" autofocus>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" value="{{ old('password-confirm') }}" autocomplete="password-confirm" autofocus>

                    @error('password-confirm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group row col-md-6">
                <label for="usertype_id">{{ __('Usertype') }}</label>

                    <select id="usertype_id" name="usertype_id" class="form-control @error('usertype_id') is-invalid @enderror" autofocus>
                        <option value="">Select usertype</option>
                        @foreach ($usertypes as $usertype)
                        <option value="{{ $usertype->id }}">{{ $usertype->type }}</option>
                        @endforeach
                    </select>

                    @error('usertype_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group row col-md-6 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary m-1">{{ __('Create User') }}</button>
                <a href="/users" class="btn btn-secondary m-1">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
