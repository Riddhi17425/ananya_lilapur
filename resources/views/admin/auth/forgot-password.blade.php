@extends('admin.layouts.auth')

@section('title', 'Forgot Password')
@section('heading', 'Forgot your password?')
@section('subheading', 'Enter your email and we will send you a link to reset it.')

@section('content')
<form method="POST" action="{{ route('password.email') }}" class="js-validate" novalidate>
    @csrf

    @include('admin.partials.input', ['name' => 'email', 'label' => 'Email address', 'type' => 'email', 'autocomplete' => 'username', 'placeholder' => 'admin@example.com', 'autofocus' => true])

    <button type="submit" class="btn">Send reset link</button>

    <p class="auth-card__back"><a href="{{ route('login') }}">&larr; Back to login</a></p>
</form>
@endsection
