@extends('admin.layouts.app')

@section('title', 'Pages Content')

@section('content')
    <div class="page-head">
        <h1>Pages Content</h1>
    </div>

    <p class="pc-intro">Edit the static text and images of the website pages. Items that have their own module (testimonials, FAQs, learning stages, photo gallery and the forms) are managed there.</p>

    <div class="panel panel--table">
        <table class="table">
            <thead>
                <tr>
                    <th>Page</th>
                    <th>Editable items</th>
                    <th>Changed items</th>
                    <th>Last changed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $key => $info)
                    @php($total = collect(\App\Support\Content::sections($key))->sum(fn ($fields) => count($fields)))
                    <tr>
                        <td><a href="{{ route('admin.page-content.edit', $key) }}"><strong>{{ $info['label'] }}</strong></a></td>
                        <td>{{ $total }}</td>
                        <td>{{ $edited[$key]->total ?? 0 }}</td>
                        <td>{{ isset($edited[$key]) ? \Illuminate\Support\Carbon::parse($edited[$key]->last_update)->format('d M Y, h:i A') : '—' }}</td>
                        <td class="actions">
                            <a class="icon-btn" href="{{ route('admin.page-content.edit', $key) }}" title="Edit" aria-label="Edit {{ $info['label'] }}">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z"/></svg>
                            </a>
                            <a class="icon-btn" href="{{ route($info['route']) }}" target="_blank" rel="noopener" title="View page" aria-label="View {{ $info['label'] }} on the website">
                                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
