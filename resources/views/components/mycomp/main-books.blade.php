<div class="container-books">
    <div class="title-container">
        <h1>{{$title ?? 'Libros disponibles'}}</h1>
    </div>
    <div class="books-container">
        @foreach ($books as $book)
            <div class="books">
                <div class="book-img">
                    <a href="{{ route('book.show', $book->id) }}">
                        <img class="card-img " src="{{ $book->thumbnail}}" alt="{{ $book->title }}">
                    </a>
                </div>
                <div class="book-info">
                    <h2>{{Str::limit($book->title,25)}}</h2>
                    <p>{{ Str::limit($book->authors,29) }}</p>
                    <p>{{ Str::limit($book->subtitle,29) }}</p>
                </div>
            </div>
        @endforeach
    </div>
    {{ $books->links() }}
</div>



