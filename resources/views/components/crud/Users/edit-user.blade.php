<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div class="edit-user">
    <form action="{{route('admin.users.update', $user)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white px-10 py-10 mx-96 my-20 border-2 rounded-lg shadow-lg">
            <div class="edit-user__title mb-6">
                <h1 class="title-crud">Editar usuario</h1>
            </div>
            <div class="edit-user__inputs">
                <div class="mb-4">
                    <label for="name" class="block font-medium text-gray-700 mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-input rounded-md shadow-sm w-full" placeholder="Nombre">
                    @error('name')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="surname" class="block font-medium text-gray-700 mb-2">Apellido</label>
                    <input type="text" name="surname" id="surname" value="{{$user->surname}}" class="form-input rounded-md shadow-sm w-full" placeholder="Apellido">
                    @error('surname')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="dni" class="block font-medium text-gray-700 mb-2">DNI</label>
                    <input type="text" name="dni" id="dni" value="{{$user->dni}}" class="form-input rounded-md shadow-sm w-full" placeholder="DNI">
                    @error('dni')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone" class="block font-medium text-gray-700 mb-2">Teléfono</label>
                    <input type="text" name="phone" id="phone" value="{{$user->phone}}" class="form-input rounded-md shadow-sm w-full" placeholder="Teléfono">
                    @error('phone')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-medium text-gray-700 mb-2">Email</label>
                    <input type="text" name="email" id="email" value="{{$user->email}}" class="form-input rounded-md shadow-sm w-full" placeholder="Email">
                    @error('email')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="is_admin" class="block font-medium text-gray-700 mb-2">Admin</label>
                    <input type="checkbox" name="is_admin" id="is_admin" value="1" class="form-checkbox rounded-md shadow-sm" {{ boolval($user->is_admin) ? 'checked' : '' }}>
                </div>
                <div class="flex items-center justify-between mt-8">
                    <a href="{{route('admin.users.index')}}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring focus:ring-red-300 disabled:opacity-25 transition ">
                        Cancelar
                    </a>
                    <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white mx-10 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 w-56 rounded-lg">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
