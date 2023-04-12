@php
$liked = $book->likes->contains('users_id', auth()->id());
@endphp

<form action="{{ route('likes.toggle', $book->id) }}" method="POST" class="d-inline">
    @csrf
    <p>Likes    {{$book->likes->count()}} </p>
    
    <button type="submit" class="py-2 px-4  {{ $liked ? 'bg-red-700 text-white' : 'bg-red-500 text-white' }}">
        <i class="fa fa-thumbs-{{ $liked ? 'up' : 'o-up' }}"></i>{{$book->likes->count()}}
    </button>
</form>
