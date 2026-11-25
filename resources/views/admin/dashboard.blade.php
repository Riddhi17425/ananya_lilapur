@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <p>You are logged in to the admin panel.</p>
@endsection
