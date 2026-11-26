@extends('admin.layouts.app')

@section('title', 'Inquiry')

@php
    use App\Models\Inquiry;

    // Fields shown in the "Details" card (the contact fields and the message have their own cards).
    $detailFields = array_diff(Inquiry::COLUMNS[$inquiry->type], ['name', 'mobile', 'email', 'message']);
@endphp

@section('content')
    <div class="page-head">
        <h1>{{ $inquiry->typeLabel() }}</h1>
        <a class="btn btn--small btn--outline" href="{{ route('admin.inquiries.index', $inquiry->type) }}">&larr; Back to list</a>
    </div>

    {{-- Who sent it --}}
    <div class="inq-hero">
        <span class="inq-hero__avatar" aria-hidden="true">{{ mb_strtoupper(mb_substr($inquiry->name, 0, 1)) }}</span>
        <div class="inq-hero__text">
            <h2>{{ $inquiry->name }}</h2>
            <p>
                <span class="inq-badge">{{ $inquiry->typeLabel() }}</span>
                Received {{ $inquiry->created_at->format('d M Y, h:i A') }} &middot; {{ $inquiry->created_at->diffForHumans() }}
            </p>
        </div>
        <div class="inq-hero__actions">
            <a class="btn btn--small" href="tel:{{ preg_replace('/\s+/', '', $inquiry->mobile) }}">Call</a>
            <a class="btn btn--small btn--outline" href="mailto:{{ $inquiry->email }}">Email</a>
        </div>
    </div>

    <div class="inq-grid">
        {{-- Contact --}}
        <section class="inq-card">
            <h3>Contact</h3>
            <dl class="inq-list">
                <dt>Mobile</dt>
                <dd><a href="tel:{{ preg_replace('/\s+/', '', $inquiry->mobile) }}">{{ $inquiry->mobile }}</a></dd>
                <dt>Email</dt>
                <dd><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></dd>
            </dl>
        </section>

        {{-- Details of the form --}}
        @if (collect($detailFields)->contains(fn ($f) => $inquiry->display($f) !== '') || $inquiry->resume_path)
            <section class="inq-card">
                <h3>Details</h3>
                <dl class="inq-list">
                    @foreach ($detailFields as $field)
                        @if ($inquiry->display($field) !== '')
                            <dt>{{ Inquiry::LABELS[$field] }}</dt>
                            <dd>{{ $inquiry->display($field) }}</dd>
                        @endif
                    @endforeach

                    @if ($inquiry->resume_path)
                        <dt>Résumé</dt>
                        <dd><a class="btn btn--small" href="{{ route('admin.inquiries.resume', $inquiry) }}">Download résumé</a></dd>
                    @endif
                </dl>
            </section>
        @endif
    </div>

    {{-- Message --}}
    @if ($inquiry->message)
        <section class="inq-card inq-card--message">
            <h3>Message</h3>
            <p>{!! nl2br(e($inquiry->message)) !!}</p>
        </section>
    @endif
@endsection
