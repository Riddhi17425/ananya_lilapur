@extends('admin.layouts.auth')

@section('title', 'Reset Password')
@section('heading', 'Set a new password')
@section('subheading', 'Use at least 8 characters with upper and lower case letters and a number.')

@section('content')
<form method="POST" action="{{ route('password.update') }}" class="js-validate" novalidate>
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    @include('admin.partials.input', ['name' => 'email', 'label' => 'Email address', 'type' => 'email', 'value' => $email, 'autocomplete' => 'username'])
    @include('admin.partials.input', ['name' => 'password', 'label' => 'New password', 'type' => 'password', 'autocomplete' => 'new-password', 'autofocus' => true, 'attrs' => 'data-rule-minlength="8" data-rule-strongpassword="true"'])
    @include('admin.partials.input', ['name' => 'password_confirmation', 'label' => 'Confirm new password', 'type' => 'password', 'autocomplete' => 'new-password', 'attrs' => 'data-rule-equalto="#password"'])

    <button type="submit" class="btn">Reset password</button>

    <p class="auth-card__back"><a href="{{ route('login') }}">&larr; Back to login</a></p>
</form>
@endsection
