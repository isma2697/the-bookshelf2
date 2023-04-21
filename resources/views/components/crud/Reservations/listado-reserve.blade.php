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
            <th>Fecha de reservas</th>
            <th>Fecha de caducaciones</th>
            
        </tr>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id ?? 'Sin id' }}</td>
                <td>{{ $reservation->users->name ?? 'Sin nombre' }}</td>
                <td>{{ $reservation->users->dni ?? 'Sin dni' }}</td>
                <td>{{ $reservation->books->title ?? 'Sin titulo' }}</td>
                <td>{{ $reservation->fecha_reserva ?? 'Sin fecha de reserva' }}</td>
                <td>{{ $reservation->fecha_vencimiento ?? 'Sin fecha de caducacion' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>