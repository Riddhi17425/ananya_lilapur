@extends('admin.layouts.app')

@section('title', 'Add Learning Stage')

@section('content')
    <h1>Add learning stage</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.learning-stages.store') }}" enctype="multipart/form-data" novalidate>
        @csrf
        @include('admin.learning-stages._form')
    </form>
@endsection
