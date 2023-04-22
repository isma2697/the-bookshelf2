<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de las reservas</title>
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
            <th>Id</th>
                <th>Nombre de usuarios</th>
                <th>DNI de usuarios</th>
                <th>Titlo del libros</th>
                <th>Fecha de prestados</th>
                <th>Fecha de caducaciones</th>
                <th>Fecha devuelto</th>
        </tr>
        @foreach ($loans as $loan)
            <tr>
                <td>{{ $loan->id ?? 'Sin id' }}</td>
                <td>{{ $loan->users->name ?? 'Sin nombre' }}</td>
                <td>{{ $loan->users->dni ?? 'Sin dni' }}</td>
                <td>{{ $loan->books->title ?? 'Sin titulo' }}</td>
                <td>{{ $loan->loan_date ?? 'Sin fecha de reserva' }}</td>
                <td>{{ $loan->return_date ?? 'Sin fecha de caducacion' }}</td>
                <td>{{ $loan->due_date ?? 'Sin fecha de devuelto' }}</td>
                    
            </tr>
        @endforeach
    </table>
</body>
</html>