@extends('admin.layouts.app')

@section('title', 'Inquiries')

@section('content')
    <div class="page-head">
        <h1>Inquiries</h1>
    </div>

    {{-- One tab for each website form --}}
    <nav class="tab-nav" aria-label="Inquiry types">
        @foreach (\App\Models\Inquiry::TYPES as $key => $label)
            <a href="{{ route('admin.inquiries.index', $key) }}" @class(['is-active' => $key === $type])>
                {{ $label }} <span class="tab-nav__count">{{ $counts[$key] ?? 0 }}</span>
            </a>
        @endforeach
    </nav>

    <div class="panel panel--table">
        <table class="table" id="inquiries-table" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    @foreach (\App\Models\Inquiry::COLUMNS[$type] as $field)
                        <th>{{ \App\Models\Inquiry::LABELS[$field] }}</th>
                    @endforeach
                    <th>Received</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
<script>
$(function () {
  $('#inquiries-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route('admin.inquiries.index', $type) }}',
    order: [[{{ count(\App\Models\Inquiry::COLUMNS[$type]) + 1 }}, 'desc']],
    columns: [
      { data: 'DT_RowIndex', name: 'id', orderable: false, searchable: false },
      @foreach (\App\Models\Inquiry::COLUMNS[$type] as $field)
      { data: '{{ $field }}', name: '{{ $field }}' },
      @endforeach
      { data: 'created_at', name: 'created_at' },
      { data: 'action', name: 'action', orderable: false, searchable: false, className: 'actions' }
    ]
  });

  // Ask before deleting (rows are drawn by DataTables, so listen on the table).
  $('#inquiries-table').on('submit', 'form[data-confirm]', function () {
    return confirm($(this).data('confirm'));
  });
});
</script>
@endpush
