
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de usuarios</title>
    <style type="text/css">
        body{
            font-family: Arial, Helvetica, sans-serif;
            padding: 0%;
            margin: 0%;
        }

        .list-title{
            color : #333;
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
            margin: 0.5em;
        }

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table th,
        .table td {
        border: 1px solid #ddd;
        padding: 4px;
        text-align: center;
        font-size: 0.75em;
        }

        .table th {
        background-color: #f2f2f2;
        color: #333;
        text-transform: uppercase;
        text-align: center;
        font-size: 1em;
        
        }
        
    </style>
</head>
<body>
    <h1 class="list-title">Registro de usuarios</h1>
    <table class="table">
    <tr>
        <th>Name</th>
        <th>Surname</th></th>
        <th>DNI</th>
        <th>Phone</th>
        <th>admin</th>
        <th>Email</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->name ?? 'Sin nombre' }}</td>
        <td>{{ $user->surname ?? 'Sin subnombre' }}</td>
            <td>{{ $user->dni ?? 'Sin dni' }}</td>
            <td>{{ $user->phone ?? 'Sin telefono' }}</td>
            <td class="admin">{{ $user->is_admin ?? 'Sin permiso' }}</td>
            <td>{{ $user->email ?? 'Sin email' }}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>