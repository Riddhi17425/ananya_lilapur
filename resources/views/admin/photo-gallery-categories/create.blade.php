@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')
    <h1>Add category</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.photo-gallery-categories.store') }}" novalidate>
        @csrf
        @include('admin.photo-gallery-categories._form')
    </form>
@endsection
