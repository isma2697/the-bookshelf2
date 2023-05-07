<div class="title-carosuel">
    <h2>RECOMENDADOS</h2>
</div>
<div class="btn-carousel-arrows">
    <img src="{{asset('svg/left-arrow.svg')}}" alt="left-arrow" class="carousel-control prev">
    <img src="{{asset('svg/right-arrow.svg')}}" alt="right-arrow" class="carousel-control next">
</div>
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
