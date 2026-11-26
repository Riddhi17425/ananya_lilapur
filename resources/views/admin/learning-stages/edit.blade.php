@extends('admin.layouts.app')

@section('title', 'Edit Learning Stage')

@section('content')
    <h1>Edit learning stage</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.learning-stages.update', $stage) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        @include('admin.learning-stages._form')
    </form>
@endsection
