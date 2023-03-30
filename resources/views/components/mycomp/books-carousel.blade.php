{{-- <button class="carousel-control prev"></button> --}}
<img src="{{asset('storage/svg/left-arrow.svg')}}" alt="left-arrow" class="carousel-control prev">
{{-- <button class="carousel-control next"></button> --}}
<img src="{{asset('storage/svg/left-arrow.svg')}}" alt="right-arrow" class="carousel-control next">

<div class="carousel">
    @foreach($books as $book)
        <div class="cards">
            <a href="{{ route('book.show', $book->id) }}">
                <img class="card-img " src="{{ $book->thumbnail}}" alt="{{ $book->title }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($book->title,25) }}</h5>
            </div>
        </div>
    @endforeach
</div>
