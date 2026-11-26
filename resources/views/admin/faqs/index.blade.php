@extends('admin.layouts.app')

@section('title', 'FAQs')

@section('content')
    <div class="page-head">
        <h1>FAQs</h1>
        <a class="btn btn--small" href="{{ route('admin.faqs.create') }}">+ Add FAQ</a>
    </div>

    <div class="panel panel--table">
        <table class="table" id="faqs-table" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
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
  $('#faqs-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route('admin.faqs.index') }}',
    order: [[1, 'asc']],
    columns: [
      { data: 'DT_RowIndex', name: 'id', orderable: false, searchable: false },
      { data: 'question', name: 'question' },
      { data: 'answer', name: 'answer' },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false, className: 'actions' }
    ]
  });

  // Active / inactive switch: save straight away without reloading the table.
  $('#faqs-table').on('change', '.js-status-form input', function () {
    var $input = $(this), $form = $input.closest('form');
    $input.prop('disabled', true);
    $.post($form.attr('action'), $form.serialize())
      .done(function () { $input.closest('.switch').attr('title', $input.prop('checked') ? 'Active' : 'Inactive'); })
      .fail(function () { $input.prop('checked', !$input.prop('checked')); alert('Could not update the status. Please try again.'); })
      .always(function () { $input.prop('disabled', false); });
  });

  // Ask before deleting (rows are drawn by DataTables, so listen on the table).
  $('#faqs-table').on('submit', 'form[data-confirm]', function () {
    return confirm($(this).data('confirm'));
  });
});
</script>
@endpush
