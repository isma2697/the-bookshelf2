<h1 class="title-crud">Listado de los libros</h1>
<div class="btn-table-crud">
    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
        <span>Descargar en PDF</span>
    </button>
    <button class="create-btn bg-green-500 hover:bg-green-700 text-white font-semibold  py-1 px-3 rounded ">
        Crear nuevo usuario
    </button>
</div>
<div class="table-crud">
    <table id="table" class="display compact">
        <thead>
            <tr>
                <th>Id</th>
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
                    <td>{{ $book->id ?? 'Sin id' }}</td>
                    <td>{{ $book->title ?? 'Sin titulo' }}</td>
                    <td>{{ $book->subtitle ?? 'Sin subtitulo' }}</td>
                    <td>{{ $book->authors ?? 'Sin autor' }}</td>
                    <td>{{ Str::limit($book->description,50) ?? 'Sin descripcion' }}</td>
                    <td>{{ $book->categories ?? 'Categoria no asignada' }}</td>
                    <td>{{ $book->published_date ?? 'Sin fecha' }}</td>
                    <td>{{ $book->page_count ?? 'Sin paginas' }}</td>
                    <td>{{ Str::limit($book->thumbnail,20) ?? 'Sin imagen' }}</td>
                    <td>{{ $book->identifier ?? 'Sin identificador' }}</td>
                     <td><button class=" btn-destroy bg-white my-2 hover:bg-gray-100 text-gray-800 font-semibold  px-2  rounded shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                    </button></td>
                    <td><button class="bg-white my-2 hover:bg-gray-100 text-gray-800 font-semibold  px-2 rounded shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                          </svg>
                    </button></td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>




