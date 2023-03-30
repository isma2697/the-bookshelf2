<div class="book-info-container">
    <div class="book-img">
        <img class="card-img " src="{{ $book->thumbnail}}" alt="{{ $book->title }}">
    </div>
    <div class="book-info">
        <h2>{{ $book->title }}</h2>
        <p>{{ $book->authors }}</p>
        <p>{{ $book->subtitle }}</p>
        <p>{{ $book->published_date }}</p>
        <p>{{ $book->page_count }}</p>
        <p>{{ $book->categories }}</p>
        <p>{{ $book->description }}</p>
        <p>{{ $book->identifier }}</p>
    </div>
</div>