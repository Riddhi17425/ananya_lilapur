@extends('admin.layouts.app')

@section('title', $info['label'].' Content')

@section('content')
    <div class="page-head">
        <h1>{{ $info['label'] }}</h1>
        <div class="page-head__actions">
            <a class="btn btn--small btn--outline" href="{{ route($info['route']) }}" target="_blank" rel="noopener">View page &nearr;</a>
            <a class="btn btn--small btn--outline" href="{{ route('admin.page-content.index') }}">&larr; All pages</a>
        </div>
    </div>

    {{-- Jump to a section --}}
    <nav class="tab-nav" aria-label="Sections">
        @foreach ($sections as $section => $fields)
            <a href="#section-{{ $loop->iteration }}">{{ $section }}</a>
        @endforeach
    </nav>

    <form class="js-validate" method="POST" action="{{ route('admin.page-content.update', $page) }}" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')

        @foreach ($sections as $section => $fields)
            <section class="panel pc-section" id="section-{{ $loop->iteration }}">
                <h2>{{ $section }}</h2>

                @foreach ($fields as $key => $field)
                    @include('admin.page-content._field')
                @endforeach
            </section>
        @endforeach

        <div class="form-actions pc-actions">
            <button type="submit" class="btn btn--small">Save changes</button>
            <a class="btn btn--small btn--outline" href="{{ route('admin.page-content.index') }}">Cancel</a>
        </div>
    </form>

    {{-- Separate form: put every text and image of this page back to the original --}}
    <form class="pc-reset" method="POST" action="{{ route('admin.page-content.destroy', $page) }}" data-confirm="Restore the original text and images of this page? Your changes will be lost.">
        @csrf
        @method('DELETE')
        <button type="submit" class="link-danger">Restore original content of this page</button>
    </form>
@endsection

@push('scripts')
<script>
$(function () {
  $('form[data-confirm]').on('submit', function () {
    return confirm($(this).data('confirm'));
  });
});
</script>
@endpush
