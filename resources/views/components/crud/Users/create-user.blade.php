<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="create-user__form bg-white px-10 py-10 mx-96 my-20 border-2 rounded-lg shadow-lg ">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="create-user__form__title">
                <h1 class="title-crud">Crear nuevo usuario</h1>
            </div>
            <div class="create-user__form__inputs">
                <div class="mb-4">
                    <label for="name" class="block font-medium text-gray-700 mb-2">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el nombre">
                    @error('name')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="surname" class="block font-medium text-gray-700 mb-2">Apellido</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el apellido">
                    @error('surname')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="dni" class="block font-medium text-gray-700 mb-2">DNI</label>
                    <input type="text" name="dni" id="dni" value="{{ old('dni') }}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el DNI">
                    @error('dni')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="phone" class="block font-medium text-gray-700 mb-2">Teléfono</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el teléfono">
                    @error('phone')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block font-medium text-gray-700 mb-2">Email</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el email">
                    @error('email')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-medium text-gray-700 mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe la contraseña">
                    @error('password')
                    <div                 class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block font-medium text-gray-700 mb-2">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input rounded-md shadow-sm w-full" placeholder="Confirma la contraseña">
                    @error('password_confirmation')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="is_admin" class="block font-medium text-gray-700 mb-2">Admin</label>
                    <input type="checkbox" name="is_admin" id="is_admin" value="1" class="form-checkbox rounded-md shadow-sm">
                </div>
                <div class="flex items-center justify-between mt-8">
                    <button type="submit" class="py-2 px-4 mx-28 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                        Crear usuario
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="py-2 px-4 mx-28 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>    
