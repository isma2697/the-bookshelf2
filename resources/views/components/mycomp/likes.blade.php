@php
$liked = $book->likes->contains('users_id', auth()->id());
@endphp

<form action="{{ route('likes.toggle', $book->id) }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="py-2 px-4">
        @if ($liked)
        <img class=" h-10 " src="{{ asset('svg/heart.svg') }}" alt="heart">
        @else
        <img class=" h-10 " src="{{ asset('svg/heartB.svg') }}" alt="heartB">
        @endif
        <p class="font-light text-sm">
            {{$book->likes->count()}}
        </p>
    </button>
</form>
