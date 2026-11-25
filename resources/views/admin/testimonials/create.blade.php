@extends('admin.layouts.app')

@section('title', 'Add Testimonial')

@section('content')
    <h1>Add testimonial</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.testimonials.store') }}" novalidate>
        @csrf
        @include('admin.testimonials._form')
    </form>
@endsection
