@extends('admin.layouts.app')

@section('title', 'Edit Photo Gallery')

@section('content')
    <h1>Edit photo gallery</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.photo-galleries.update', $gallery) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        @include('admin.photo-galleries._form')
    </form>
@endsection
