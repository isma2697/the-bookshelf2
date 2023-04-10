<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de los libros</title>
    <style type="text/css">
        body{
            font-family: Arial, Helvetica, sans-serif;
            padding: 0%;
            margin: 0%;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }

        .table th,
        .table td {
        border: 1px solid #b4b4b4;
        padding: 1px;
        text-align: center;
        font-size: 0.65em;
        }

        .table th {
        padding: 1px;
        background-color: #cbcbcbd5;
        color: #333;
        text-transform: uppercase;
        text-align: center;
        font-size: 0.7em;
        
        } 
        .list-title{
            color : #333;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            margin: 0.5em;
        }
    </style>
</head>
<body>
    
    <h1 class="list-title">Registro de los libros</h1>
    <table class="table ">
        <tr>
            <th>Titulo</th>
            <th>descripción</th>
            <th>Categorias</th>
            <th>Autor</th>
            <th>Fecha de publicacion</th>
            <th>Nº paginas</th>
            <th>identificador</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->title ?? 'Sin titulo' }}</td>
                <td>{{ Str::limit($book->description,50) ?? 'Sin descripcion' }}</td>
                <td>{{ $book->categories ?? 'Categoria no asignada' }}</td>
                <td>{{ $book->authors ?? 'Sin autor' }}</td>
                <td>{{ $book->published_date ?? 'Sin fecha' }}</td>
                <td>{{ $book->page_count ?? 'Sin paginas' }}</td>
                <td>{{ $book->identifier ?? 'Sin identificador' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>