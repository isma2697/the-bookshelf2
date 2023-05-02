<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="create-book__form bg-white px-10 py-10 mx-80 my-20 border-2 rounded-lg shadow-lg ">
        <form action="{{route('admin.books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="create-book__form__title">
                <h1 class="title-crud">Crear nuevo libro</h1>
            </div>
            
            <div class="create-book__form__inputs">
                <div class="mb-4">
                    <label for="title" class="block font-medium text-gray-700 mb-2">Título</label>
                    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el titulo">
                    @error('title')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="subtitle" class="block font-medium text-gray-700 mb-2">Subtítulo</label>
                    <input type="text" name="subtitle" id="subtitle" value="{{old('subtitle')}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el subtitulo">
                    @error('subtitle')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="authors" class="block font-medium text-gray-700 mb-2">Autor</label>
                    <input type="text" name="authors" id="authors" value="{{old('authors')}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe nombre del autor ">
                    @error('authors')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block font-medium text-gray-700 mb-2">Descripción</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-textarea rounded-md shadow-sm w-full" placeholder="Escribe la descripción">{{old('description')}}</textarea>
                    @error('description')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="categories" class="block font-medium text-gray-700 mb-2">Categorías</label>
                    <select name="categories[]" id="categories" class="form-multiselect block rounded-md shadow-sm mt-1 w-full" multiple>
                        @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                    @error('categories')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="published_date" class="block font-medium text-gray-700 mb-2">Fecha de publicación</label>
                    <input type="date" name="published_date" id="published_date" value="{{old('published_date')}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el fecha de publicación ">
                    @error('published_date')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="page_count" class="block font-medium text-gray-700 mb
                    <div class="create-book__form__inputs__input">
                        <label for="page_count" class="block font-medium text-gray-700 mb-2">Número de páginas</label>
                        <input type="number" name="page_count" id="page_count" value="{{old('page_count')}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el numero de paginas ">
                        @error('page_count')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="thumbnail" class="block font-medium text-gray-700 mb-2">Imagen</label>
                        <input type="text" name="thumbnail" id="thumbnail" value="{{old('thumbnail')}}" class="form-input rounded-md shadow-sm w-full" placeholder="Inserta la url de la portada ">
                        @error('thumbnail')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="identifier" class="block font-medium text-gray-700 mb-2">Identificador</label>
                        <input type="text" name="identifier" id="identifier" value="{{old('identifier')}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el numero identificador ">
                        @error('identifier')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex items-center justify-between mt-8">
                        <button type="submit" class="py-2 px-4 mx-28 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                            Crear libro
                        </button>
                        <a href="{{route('admin.books.index')}}" class="py-2 px-4 mx-28 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>