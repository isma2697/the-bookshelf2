<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<h1>Listado de usuarios</h1>
<table class="table table-bordered table-bordered table-striped">
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
            <td>{{ $user->is_admin ?? 'Sin permiso' }}</td>
            <td>{{ $user->email ?? 'Sin email' }}</td>
        </tr>
    @endforeach

</table>