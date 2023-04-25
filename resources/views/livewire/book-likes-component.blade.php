{{-- <div class="container mx-auto mt-8">
    <ul class="flex border-b">
        <li class="-mb-px mr-1">
            <a class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" href="#likes">
                Likes
            </a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#bookmarks">
                Marcadores
            </a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#reservations">
                Reservas
            </a>
        </li>
        <li class="mr-1">
            <a class="bg-white inline-block py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" href="#loans">
                Préstamos
            </a>
        </li>
    </ul>
    <div class="bg-white rounded shadow p-4">
        <div id="likes" class="">
            <h3 class="text-lg font-bold mb-4">Likes</h3>
            <ul>
                @foreach($likes as $like)
                <li class="mb-2">{{ $like->books->title }}</li>
                @endforeach
            </ul>
        </div>
        <div id="bookmarks" class="hidden">
            <h3 class="text-lg font-bold mb-4">Marcadores</h3>
            <ul>
                @foreach($bookmarks as $bookmark)
                <li class="mb-2">{{ $bookmark->books->title }}</li>
                @endforeach
            </ul>
        </div>
        <div id="reservations" class="hidden">
            <h3 class="text-lg font-bold mb-4">Reservas</h3>
            <ul>
                @foreach($reservations as $reservation)
                <li class="mb-2">{{ $reservation->books->title }}</li>
                @endforeach
            </ul>
        </div>
        <div id="loans" class="hidden">
            <h3 class="text-lg font-bold mb-4">Préstamos</h3>
            <ul>
                @foreach($loans as $loan)
                <li class="mb-2">{{ $loan->books->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div> --}}
<div class="container mx-auto mt-8" x-data="{ tab: '{{ $section ?? 'likes' }}' }" >
    <ul class="flex border-b">
        <li class="-mb-px mr-1" :class="{ '-mb-px': tab === 'likes' }">
            <button :class="{ 'border-b-0': tab === 'likes' }" class="bg-blue-300 inline-block border-l border-t border-r rounded-t py-2 px-4 text-blue-700 font-semibold" @click="tab = 'likes'">
                Likes
            </button>
        </li>
        <li class="mr-1" :class="{ '-mb-px': tab === 'bookmarks' }">
            <button :class="{ 'border-b-0': tab === 'bookmarks' }" class="bg-green-300 inline-block border-l border-t border-r rounded-t py-2 px-4 py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" @click="tab = 'bookmarks'">
                Marcadores
            </button>
        </li>
        <li class="mr-1" :class="{ '-mb-px': tab === 'reservations' }">
            <button :class="{ 'border-b-0': tab === 'reservations' }" class="bg-pink-300 inline-block border-l border-t border-r rounded-t py-2 px-4 py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" @click="tab = 'reservations'">
                Reservas
            </button>
        </li>
        <li class="mr-1" :class="{ '-mb-px': tab === 'loans' }">
            <button :class="{ 'border-b-0': tab === 'loans' }" class="bg-gray-400 inline-block border-l border-t border-r rounded-t py-2 px-4 py-2 px-4 text-blue-500 hover:text-blue-800 font-semibold" @click="tab = 'loans'">
                Préstamos
            </button>
        </li>
        
    </ul>
    <div class="bg-red-200 rounded shadow p-4">
        <div x-show="tab === 'likes'" class="transition duration-300">
            <!-- Contenido de la sección Likes -->
            <p>hola soy likes</p>
        </div>
        <div x-show="tab === 'bookmarks'" class="transition duration-300">
            <!-- Contenido de la sección Marcadores -->
            <p>hola soy bookmark</p>
        </div>
        <div x-show="tab === 'reservations'" class="transition duration-300">
            <!-- Contenido de la sección Reservas -->
            <p>hola soy reservations</p>
        </div>
        <div x-show="tab === 'loans'" class="transition duration-300">
            <!-- Contenido de la sección Préstamos -->
            <p>hola soy loans</p>
        </div>
    </div>
</div>

