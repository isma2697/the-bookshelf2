@php
$reserved = DB::table('reserves')->where('users_id', auth()->id())->where('books_id', $book->id)->exists();
@endphp

<form action="{{ route('reservations.toggle', $book->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="w-48 py-2 px-4 border rounded-lg ml-6 mt-5 {{ $reserved ? 'bg-blue-800 text-white' : 'bg-blue-500 text-white' }}">
        <i class="fa fa-calendar{{ $reserved ? '-check-o' : '' }}"></i>
        {{ $reserved ? 'Reservado' : 'Reservar' }}
    </button>
</form>
