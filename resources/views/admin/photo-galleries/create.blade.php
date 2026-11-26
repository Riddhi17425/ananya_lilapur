@extends('admin.layouts.app')

@section('title', 'Add Photo Gallery')

@section('content')
    <h1>Add photo gallery</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.photo-galleries.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        @include('admin.photo-galleries._form')
    </form>
@endsection
