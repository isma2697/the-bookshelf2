<h1 class="title-crud">Listado de las reservas</h1>
<div class="btn-table-crud">
    <a href="{{route('admin.reserve.listado.reservation')}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
        <span>Descargar en PDF</span>
    </a>
</div>
<div class="table-crud">
    <table id="table" class="display compact">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre de usuarios</th>
                <th>DNI de usuarios</th>
                <th>Titlo del libros</th>
                <th>Fecha de reservas</th>
                <th>Fecha de caducaciones</th>
                <th>Confirmacion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr data-id='{{$reservation->id}}'>
                    <td>{{ $reservation->id ?? 'Sin id' }}</td>
                    <td>{{ $reservation->users->name ?? 'Sin nombre' }}</td>
                    <td>{{ $reservation->users->dni ?? 'Sin dni' }}</td>
                    <td>{{ $reservation->books->title ?? 'Sin titulo' }}</td>
                    <td>{{ $reservation->fecha_reserva ?? 'Sin fecha de reserva' }}</td>
                    <td>{{ $reservation->fecha_vencimiento ?? 'Sin fecha de caducacion' }}</td>
                    <td class="flex justify-center"><a href="{{ route('reservations.confirm', $reservation->id) }}" class="btn btn-success btn-sm">
                        <img src="{{ asset('svg/check.svg') }}" alt="edit" id="edit" style="height: 2.5em; width: 2.5em;">
                    </a></td>
                    
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>
</div>




