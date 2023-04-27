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
            <div id="likes" class="">
                <h3 class="text-lg font-bold mb-4">Likes</h3>
                <ul>
                    @foreach($likes as $like)
                    <img src="{{ $like->books->thumbnail }}" alt="">
                    <li class="mb-2">{{ $like->books->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div x-show="tab === 'bookmarks'" class="transition duration-300">
            <div id="bookmarks">
                <h3 class="text-lg font-bold mb-4">Marcadores</h3>
                <ul>
                    @foreach($bookmarks as $bookmark)
                    <img src="{{ $bookmark->books->thumbnail }}" alt="">
                    <li class="mb-2">{{ $bookmark->books->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div x-show="tab === 'reservations'" class="transition duration-300">
            <div id="reservations">
                <h3 class="text-lg font-bold mb-4">Reservas</h3>
                <ul>
                    @foreach($reservations as $reservation)
                    <img src="{{ $reservation->books->thumbnail }}" alt="">
                    <li class="mb-2">{{ $reservation->books->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div x-show="tab === 'loans'" class="transition duration-300">
            <div id="loans">
                <h3 class="text-lg font-bold mb-4">Préstamos</h3>
                <ul>
                    @foreach($loans as $loan)
                    <img src="{{ $loan->books->thumbnail }}" alt="">
                    <li class="mb-2">{{ $loan->books->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

