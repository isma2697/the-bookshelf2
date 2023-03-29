<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<h1>Listado de clintes</h1>
<table class="table table-bordered table-bordered table-striped">
    <tr>
        <th>Title</th>
        <th>Subtitle</th>
        <th>Author</th>
        <th>description</th>
        <th>categories</th>
        <th>Published date</th>
        <th>page count</th>
        <th>thumbnail</th>
        <th>identifier</th>
    </tr>
    @foreach ($books as $book)
        <tr>
            <td>{{ $book->title ?? 'Sin titulo' }}</td>
            <td>{{ $book->subtitle ?? 'Sin subtitulo' }}</td>
            <td>{{ $book->authors ?? 'Sin autor' }}</td>
            <td>{{ Str::limit($book->description,50) ?? 'Sin descripcion' }}</td>
            <td>{{ $book->categories ?? 'Categoria no asignada' }}</td>
            <td>{{ $book->published_date ?? 'Sin fecha' }}</td>
            <td>{{ $book->page_count ?? 'Sin paginas' }}</td>
            <td>{{ Str::limit($book->thumbnail,20) ?? 'Sin imagen' }}</td>
            <td>{{ $book->identifier ?? 'Sin identificador' }}</td>
        </tr>
    @endforeach
</table>