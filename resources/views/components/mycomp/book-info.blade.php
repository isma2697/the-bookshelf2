<div class="book-info-container">
    <div class="book-img">
        <img class="card-img " src="{{ $book->thumbnail}}" alt="{{ $book->title }}">
        <x-mycomp.likes :book="$book"/>
    </div>
    <div class="book-info">
        <h2>{{ $book->title }}</h2>
        <hr>
        <p class="info">Subtitulo:</p>
        <p class="info_db">{{ $book->subtitle ?? 'No hay subtitulo' }}</p>
        <p class="info">Descripción:</p>
        <p class="info_db">{{ $book->description ?? 'No hay descripción' }}</p>
        <p class="info">Categoria:</p>
        <p class="info_db">{{ $book->categories ?? 'No hay categoria' }}</p>
        <p class="info">Autores:</p>
        <p class="info_db">{{ $book->authors ?? 'No hay autores' }}</p>
        <p class="info">Fecha de publicacion:</p>
        <p class="info_db">{{ $book->published_date ?? 'No hay fecha de publicacion' }}</p>
        <p class="info">Números de paginas:</p>
        <p class="info_db">{{ $book->page_count ?? 'No hay numero de paginas' }}</p>
        <p class="info">Números de identificador:</p>
        <p class="info_db">{{ $book->identifier ?? 'No hay numero de identificador' }}</p>
    </div>
</div>