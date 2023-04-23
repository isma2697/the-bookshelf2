
@php
    $bookmarked = false;
    if (auth()->check()) {
        $bookmarked = auth()->user()->bookmarks()->where('books_id', $book)->exists();
    }
    
@endphp

<form action="{{ route('bookmarks.toggle', $book) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="py-2 px-4 {{ $bookmarked ? 'bg-green-700 text-white' : 'bg-blue-500 text-white' }}">
        <i class="fa fa-bookmark{{ $bookmarked ? '' : '-o' }}"></i>
        {{ $bookmarked ? 'Eliminar marcador' : 'Guardar marcador' }}
    </button>
</form>
