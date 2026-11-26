@extends('admin.layouts.app')

@section('title', 'Add FAQ')

@section('content')
    <h1>Add FAQ</h1>

    <form class="panel js-validate" method="POST" action="{{ route('admin.faqs.store') }}" novalidate>
        @csrf
        @include('admin.faqs._form')
    </form>
@endsection
