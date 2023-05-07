<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<div class="edit-book max-w-4xl mx-auto py-12">
    <form action="{{route('admin.books.update', $book)}}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg px-8 pt-6 pb-8 mb-4">
      @csrf
      @method('PUT')
      <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-700">Editar libro</h1>
      </div>
      <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Titulo</label>
        <input type="text" name="title" id="title" value="{{$book->title}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el titulo">
        @error('title')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="subtitle" class="block text-gray-700 font-bold mb-2">Subtitulo</label>
        <input type="text" name="subtitle" id="subtitle" value="{{$book->subtitle}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el subtitulo">
        @error('subtitle')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="authors" class="block text-gray-700 font-bold mb-2">Autor</label>
        <input type="text" name="authors" id="authors" value="{{$book->authors}}" class="form-input rounded-md shadow-sm w-full" placeholder="Escribe el autor">
        @error('authors')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Descripcion</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-textarea rounded-md shadow-sm w-full" placeholder="Escribe la descripcion">{{$book->description}}</textarea>
        @error('description')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="categories" class="block text-gray-700 font-bold mb-2">Categorias</label>
        <div class="relative">
            <select name="categories[]" id="categories" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" multiple>
                @php
                $selectedCategories = explode(',', $book->categories);
                @endphp
                @foreach($categories as $category)
                <option value="{{ $category }}" {{ in_array($category, $selectedCategories) ? 'selected' : '' }}>
                    {{ $category }}
                </option>
                @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>
    </div>
      <div class="mb-4">
        <label for="published_date" class="block text-gray-700 font-bold mb-2">Fecha de publicacion</label>
        <input type="date" name="published_date" id="published_date" value="{{$book->published_date}}" class="form-input rounded-md shadow-sm w-full">
        @error('published_date')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="page_count" class="block text-gray-700 font-bold mb-2">Numero de paginas</label>
        <input type="number" name="page_count" id="page_count" value="{{$book->page_count}}" class="form-input rounded-md shadow-sm w-full">
        @error('page_count')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="thumbnail" class="block text-gray-700 font-bold mb-2">Imagen</label>
        <input type="text" name="thumbnail" id="thumbnail" value="{{$book->thumbnail}}" class="form-input rounded-md shadow-sm w-full">
        @error('thumbnail')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-4">
        <label for="identifier" class="block text-gray-700 font-bold mb-2">Identificador</label>   
        <input type="text" name="identifier" id="identifier" value="{{$book->identifier}}" class="form-input rounded-md shadow-sm w-full">
        @error('identifier')
        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
        @enderror
      </div>
      <div class="flex items-center justify-between mt-8">
        <a href="{{route('admin.books.index')}}" class="py-2 px-4 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white  transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg w-56">
          Cancelar
        </a>
        <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white  transition ease-in duration-200 text-center font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg w-56">
          Editar libro
        </button>
      </div>
    </form>
  </div>
</div>
    