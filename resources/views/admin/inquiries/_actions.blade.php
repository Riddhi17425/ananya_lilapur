{{-- View / delete icon buttons of the inquiries table --}}
<a class="icon-btn" href="{{ route('admin.inquiries.show', $inquiry) }}" title="View" aria-label="View">
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
</a>
<form method="POST" action="{{ route('admin.inquiries.destroy', $inquiry) }}" data-confirm="Delete this inquiry?">
    @csrf
    @method('DELETE')
    <button type="submit" class="icon-btn icon-btn--danger" title="Delete" aria-label="Delete">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><path d="M6 6l1 14h10l1-14"/><path d="M10 11v6M14 11v6"/></svg>
    </button>
</form>
