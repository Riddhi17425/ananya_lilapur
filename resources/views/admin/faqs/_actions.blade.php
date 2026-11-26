{{-- Edit / delete icon buttons of the FAQs table --}}
<a class="icon-btn" href="{{ route('admin.faqs.edit', $faq) }}" title="Edit" aria-label="Edit">
    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 013 3L7 19l-4 1 1-4z"/></svg>
</a>
<form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" data-confirm="Delete this FAQ?">
    @csrf
    @method('DELETE')
    <button type="submit" class="icon-btn icon-btn--danger" title="Delete" aria-label="Delete">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 6h18"/><path d="M8 6V4h8v2"/><path d="M6 6l1 14h10l1-14"/><path d="M10 11v6M14 11v6"/></svg>
    </button>
</form>
