@php
$liked = $book->likes->contains('users_id', auth()->id());
@endphp

<form action="{{ route('likes.toggle', $book->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn  bg-{{ $liked ? 'primary' : 'light' }}  btn-sm">
        <i class="fa fa-thumbs-{{ $liked ? 'up' : 'o-up' }}"></i>
        {{ $book->likes->count() }} Me gusta
    </button>
</form>
