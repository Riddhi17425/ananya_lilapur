@extends('admin.layouts.auth')

@section('title', 'Login')
@section('heading', 'Welcome back')
@section('subheading', 'Log in to continue to the admin panel.')

@section('content')
<form method="POST" action="{{ route('login') }}" class="js-validate" novalidate>
    @csrf

    @include('admin.partials.input', ['name' => 'email', 'label' => 'Email address', 'type' => 'email', 'autocomplete' => 'username', 'placeholder' => 'admin@example.com', 'autofocus' => true])
    @include('admin.partials.input', ['name' => 'password', 'label' => 'Password', 'type' => 'password', 'autocomplete' => 'current-password', 'placeholder' => 'Enter your password'])

    <div class="form-row">
        <label class="check">
            <input type="checkbox" name="remember" value="1" @checked(old('remember'))>
            <span>Remember me</span>
        </label>
        <a href="{{ route('password.request') }}">Forgot password?</a>
    </div>

    <button type="submit" class="btn">Log in</button>
</form>
@endsection
