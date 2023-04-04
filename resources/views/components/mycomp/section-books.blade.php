<h1 class="section-h1">Relacionados</h1>

<div class="carousel section-carousel">
    @foreach($books as $book)
        <div class="cards section-card">
            <a href="{{ route('book.show', $book->id) }}">
                <img class="card-img " src="{{ $book->thumbnail}}" alt="{{ $book->title }}">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{ Str::limit($book->title,25) }}</h5>
            </div>
        </div>
    @endforeach
</div>