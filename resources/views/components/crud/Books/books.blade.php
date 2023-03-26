<div class="table-crud">
    <table id="table" class="display compact">
        <thead>
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
                <th>Borrar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr data-id='{{$book->id}}'>
                    <td>{{ $book->title ?? 'Sin titulo' }}</td>
                    <td>{{ $book->subtitle ?? 'Sin subtitulo' }}</td>
                    <td>{{ $book->authors ?? 'Sin autor' }}</td>
                    <td>{{ Str::limit($book->description,50) ?? 'Sin descripcion' }}</td>
                    <td>{{ $book->categories ?? 'Categoria no asignada' }}</td>
                    <td>{{ $book->published_date ?? 'Sin fecha' }}</td>
                    <td>{{ $book->page_count ?? 'Sin paginas' }}</td>
                    <td>{{ Str::limit($book->thumbnail,20) ?? 'Sin imagen' }}</td>
                    <td>{{ $book->identifier ?? 'Sin identificador' }}</td>
                    <td><button class="btn btn-danger btn_borrar">Borrar</button></td>
                    <td><button class="btn btn-warning btn_editar">Editar</button></td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>




