@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
    <h1>Edit category</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.photo-gallery-categories.update', $category) }}" novalidate>
        @csrf
        @method('PUT')
        @include('admin.photo-gallery-categories._form')
    </form>
@endsection
