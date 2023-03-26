<div class="table-crud">
    <table id="table" class="display compact">
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th></th>
                <th>DNI</th>
                <th>Phone</th>
                <th>Rol</th>
                <th>Email</th>
                <th>Borrar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr data-id='{{$user->id}}'>
                    <td>{{ $user->name ?? 'Sin nombre' }}</td>
                    <td>{{ $user->surname ?? 'Sin subnombre' }}</td>
                    <td>{{ $user->dni ?? 'Sin dni' }}</td>
                    <td>{{ $user->phone ?? 'Sin telefono' }}</td>
                    <td>{{ $user->rol ?? 'Sin rol' }}</td>
                    <td>{{ $user->email ?? 'Sin email' }}</td>
                    <td><button class="btn btn-danger btn_borrar">Borrar</button></td>
                    <td><button class="btn btn-warning btn_editar">Editar</button></td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>




