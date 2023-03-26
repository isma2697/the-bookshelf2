

<div class="imagebooks">
    @foreach ($books as $book)
        <div>
            <img src="{{ $book->thumbnail }}" alt="{{ $book->title }}">
        </div>
        
    @endforeach
</div>