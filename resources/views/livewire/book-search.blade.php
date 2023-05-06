<div class="search-div w-full">
    <div class="space-y-7 w-full">
        <div class="relative">
            <input type="text" class="form-input block w-full pl-10 pr-3 py-2 border rounded-md leading-5 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue transition duration-150 ease-in-out" placeholder="Buscar libros..." wire:model.debounce.500ms="search">
            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
        <div class="absolute w-3/12 result-search">
            @if($search)
            @foreach($books->take(5) as $book)
            <a href="{{ route('book.show', $book->id) }}">
                <div style="background-color: #f3f5ef; " class=" overflow-hidden shadow-lg  p-3 flex items-center space-x-1">
                    @if($book->thumbnail)
                    <div class="w-1/4">
                        <img src="{{ $book->thumbnail }}" class="h-20 object-cover border" alt="{{ $book->title }}">
                    </div>
                    @endif
                    <div class="w-3/4">
                        <h5 class="text-lg font-medium truncate">{{ $book->title }}</h5>
                        <p class="text-gray-500 text-sm mt-1 truncate">{{ $book->subtitle }}</p>
                        {{-- <p class="text-gray-700 text-sm mt-2 truncate">{{ Str::limit($book->description, 100) }}</p> --}}
                    </div>
                </div>
            </a>
            @endforeach
            @endif
        </div>
    </div>      
</div>