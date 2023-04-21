@php
    $reserved = auth()->user()->reserves()->where('books_id', $book->id)->exists();
@endphp

<form action="{{ route('reservations.toggle', $book->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="py-2 px-4 {{ $reserved ? 'bg-green-700 text-white' : 'bg-blue-500 text-white' }}">
        <i class="fa fa-calendar{{ $reserved ? '-check-o' : '' }}"></i>
        {{ $reserved ? 'Cancelar reserva' : 'Reservar' }}
    </button>
</form>
