@extends('admin.layouts.app')

@section('title', 'Edit FAQ')

@section('content')
    <h1>Edit FAQ</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.faqs.update', $faq) }}" novalidate>
        @csrf
        @method('PUT')
        @include('admin.faqs._form')
    </form>
@endsection
