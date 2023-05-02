@php
$bookmarked = DB::table('bookmarks')->where('users_id', auth()->id())->where('books_id', $book->id)->exists();
@endphp


<form action="{{ route('bookmarks.toggle', $book) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="py-2 px-4">
        @if ($bookmarked)
            <img src="{{ asset('svg/saved.svg') }}" alt="save(1)">
        @else
            <img src="{{ asset('svg/save.svg') }}" alt="save">
        @endif
        {{ $bookmarked ? 'Eliminar marcador' : 'Guardar marcador' }}
    </button>
</form>
