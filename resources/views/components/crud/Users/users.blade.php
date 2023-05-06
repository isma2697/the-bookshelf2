<h1 class="title-crud">Listado de los usuarios</h1>
<div class="btn-table-crud">
    <a href="{{route('admin.users.listado-users')}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
        <span>Descargar en PDF</span>
    </a>
    <a href='{{route('admin.users.create')}}' class="create-btn bg-green-500 hover:bg-green-700 text-white font-semibold  py-3 px-3 rounded " href>
        Crear nuevo usuario
    </a>
</div>
<div class="table-crud ">
    <table id="table" class="display compact">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Surname</th></th>
                <th>DNI</th>
                <th>Phone</th>
                <th>admin</th>
                <th>Email</th>
                <th>Borrar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr data-id='{{$user->id}}'>
                    <td>{{ $user->id ?? 'Sin id' }}</td>
                    <td>{{ $user->name ?? 'Sin nombre' }}</td>
                    <td>{{ $user->surname ?? 'Sin subnombre' }}</td>
                    <td>{{ $user->dni ?? 'Sin dni' }}</td>
                    <td>{{ $user->phone ?? 'Sin telefono' }}</td>
                    <td>{{ $user->is_admin ?? 'Sin permiso' }}</td>
                    <td>{{ $user->email ?? 'Sin email' }}</td>
                    <td class="flex justify-center  "><button class=" btn_borrar my-2 text-gray-800 font-semibold  px-2  rounded shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                    </button></td>
                    <td ><a class="flex justify-center" href="{{url('/admin/users')}}/{{$user->id}}/edit">
                        <img src="{{ asset('svg/edit.svg') }}" alt="edit" id="edit" style="height: 1.5em; width: 1.5em;">
                    </a></td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>




