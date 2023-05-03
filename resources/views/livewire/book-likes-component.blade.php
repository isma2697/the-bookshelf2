<div class="container mx-auto mt-8" x-data="{ tab: '{{ $section ?? 'likes' }}' }" >
    <ul class="flex border-b">
        <li class="-mb-px mr-1" :class="{ '-mb-px': tab === 'likes' }">
            <button :class="{ 'border-b-0 bg-blue-50 border border-blue-700 ': tab === 'likes' }" class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" @click="tab = 'likes'">
                Likes
            </button>
        </li>
        <li class="mr-1" :class="{ '-mb-px': tab === 'bookmarks' }">
            <button :class="{ 'border-b-0 bg-blue-50 border border-blue-700 ': tab === 'bookmarks' }" class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" @click="tab = 'bookmarks'">
                Marcadores
            </button>
        </li>
        <li class="mr-1" :class="{ '-mb-px': tab === 'reservations' }">
            <button :class="{ 'border-b-0 bg-blue-50 border border-blue-700 ': tab === 'reservations' }" class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" @click="tab = 'reservations'">
                Reservas
            </button>
        </li>
        <li class="mr-1" :class="{ '-mb-px': tab === 'loans' }">
            <button :class="{ 'border-b-0 bg-blue-50 border border-blue-700 ': tab === 'loans' }" class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" @click="tab = 'loans'">
                Préstamos
            </button>
        </li>
    </ul>
    <div class="border-2 border-blue-700 bg-blue-50 rounded-md shadow-md content-books ">
        <!-- Likes -->
        <div x-show="tab === 'likes'" class="transition p-4 duration-300">
            <div id="likes">
                @if($likes->count())
                    <ul>
                        @foreach($likes as $like)
                        <li class="mb-2">
                            <img src="{{ $like->books->thumbnail }}" alt="">
                            <div class="flex flex-col ">
                                <a href="{{ route('book.show', $like->books->id) }}">
                                    <p class="text-base font-semibold">{{ Str::limit($like->books->title,20) }}</p>
                                </a>
                                <hr class="mb-4 mx-0">
                                <p class="text-sm mb-2">Fecha de publicación: {{ $like->books->published_date}}</p>
                                <p class="text-sm mb-2">Nº de paginas: {{ $like->books->page_count }}</p>
                                <p class="text-sm mb-2">Identificar: {{ $like->books->identifier}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <p>No tienes libros en esta sección.</p>
                @endif
            </div>
        </div>
        <!-- Bookmarks -->
        <div x-show="tab === 'bookmarks'" class="transition p-4 duration-300">
            <div id="bookmarks">
                @if($bookmarks->count())
                    <ul>
                        @foreach($bookmarks as $bookmark)
                        <li class="mb-2">
                            <img src="{{ $bookmark->books->thumbnail }}" alt="">
                            <div class="flex flex-col">
                                <a href="{{ route('book.show', $bookmark->books->id) }}">
                                    <p class="text-base font-semibold">{{ Str::limit($bookmark->books->title,20) }}</p>
                                </a>
                                <hr class="mb-4 mx-0">
                                <p class="text-sm mb-2">Fecha de publicación: {{ $bookmark->books->published_date}}</p>
                                <p class="text-sm mb-2">Nº de paginas: {{ $bookmark->books->page_count }}</p>
                                <p class="text-sm mb-2">Identificar: {{ $bookmark->books->identifier}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <p>No tienes libros en esta sección.</p>
                @endif
            </div>
        </div>
        <!-- Reservations -->
        <div x-show="tab === 'reservations'" class="transition p-4 duration-300">
            <div id="reservations">
                @if($reservations->count())
                    <ul>
                        @foreach($reservations as $reservation)
                        <li class="mb-2">
                            <img src="{{ $reservation->books->thumbnail }}" alt="">
                            <div class="flex flex-col">
                                <a href="{{ route('book.show', $reservation->books->id) }}">
                                    <p class="text-base font-semibold">{{ Str::limit($reservation->books->title,20) }}</p>
                                </a>
                                <hr class="mb-4 mx-0">
                                <p class="text-sm mb-2">Fecha de publicación: {{ $reservation->books->published_date}}</p>
                                <p class="text-sm mb-2">Nº de paginas: {{ $reservation->books->page_count }}</p>
                                <p class="text-sm mb-2">Identificar: {{ $reservation->books->identifier}}</p>
                            </div>

                        </li>
                        @endforeach
                    </ul>
                @else
                    <p>No tienes libros en esta sección.</p>
                @endif
            </div>
        </div>
        <!-- Loans -->
        <div x-show="tab === 'loans'" class="transition p-4 duration-300">
            <div id="loans">
                @if($loans->count())
                    <ul>
                        @foreach($loans as $loan)
                        <li class="mb-2">
                            <img src="{{ $loan->books->thumbnail }}" alt="">
                            <div class="flex flex-col">
                                <a href="{{ route('book.show', $loan->books->id) }}">
                                    <p class="text-base font-semibold">{{ Str::limit($loan->books->title,20) }}</p>
                                </a>
                                <hr class="mb-4 mx-0">
                                <p class="text-sm mb-2">Fecha de publicación: {{ $loan->books->published_date}}</p>
                                <p class="text-sm mb-2">Nº de paginas: {{ $loan->books->page_count }}</p>
                                <p class="text-sm mb-2">Identificar: {{ $loan->books->identifier}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <p>No tienes libros en esta sección.</p>
                @endif
            </div>
        </div>
    </div>
</div>

