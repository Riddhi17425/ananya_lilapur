@extends('admin.layouts.app')

@section('title', 'Photo Gallery')

@section('content')
    <div class="page-head">
        <h1>Photo Gallery</h1>
        <a class="btn btn--small" href="{{ route('admin.photo-galleries.create') }}">+ Add photo gallery</a>
    </div>

    <div class="panel panel--table">
        <table class="table" id="galleries-table" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
<script>
$(function () {
  $('#galleries-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route('admin.photo-galleries.index') }}',
    order: [[2, 'asc']],
    columns: [
      { data: 'DT_RowIndex', name: 'id', orderable: false, searchable: false },
      { data: 'list_image', name: 'list_image', orderable: false, searchable: false },
      { data: 'name', name: 'name' },
      { data: 'category', name: 'category', orderable: false },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false, className: 'actions' }
    ]
  });

  // Active / inactive switch: save straight away without reloading the table.
  $('#galleries-table').on('change', '.js-status-form input', function () {
    var $input = $(this), $form = $input.closest('form');
    $input.prop('disabled', true);
    $.post($form.attr('action'), $form.serialize())
      .done(function () { $input.closest('.switch').attr('title', $input.prop('checked') ? 'Active' : 'Inactive'); })
      .fail(function () { $input.prop('checked', !$input.prop('checked')); alert('Could not update the status. Please try again.'); })
      .always(function () { $input.prop('disabled', false); });
  });

  // Ask before deleting (rows are drawn by DataTables, so listen on the table).
  $('#galleries-table').on('submit', 'form[data-confirm]', function () {
    return confirm($(this).data('confirm'));
  });
});
</script>
@endpush
