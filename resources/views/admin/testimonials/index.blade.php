@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="page-head">
        <h1>Testimonials</h1>
        <a class="btn btn--small" href="{{ route('admin.testimonials.create') }}">+ Add testimonial</a>
    </div>

    <div class="panel panel--table">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Stars</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->id }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->reviewer_category ?? '—' }}</td>
                        <td class="stars" title="{{ $testimonial->star }} / 5">{{ str_repeat('★', $testimonial->star) }}{{ str_repeat('☆', 5 - $testimonial->star) }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($testimonial->description, 70) }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.testimonials.status', $testimonial) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="badge {{ $testimonial->status ? 'badge--on' : 'badge--off' }}" title="Click to change">
                                    {{ $testimonial->status ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                        <td class="actions">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}">Edit</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="link-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="empty">No testimonials yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $testimonials->links('admin.partials.pagination') }}
@endsection
