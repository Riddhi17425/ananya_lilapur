@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
    <h1>Edit testimonial</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" novalidate>
        @csrf
        @method('PUT')
        @include('admin.testimonials._form')
    </form>
@endsection
