
    <div class="floating-box">
        <!-- component -->
        <div class=" flex justify-center">
            <div class="relative inline-block mb-20">
                <!-- Dropdown menu -->
                <div class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden bg-white rounded-md shadow-xl dark:bg-gray-800">
                    <a href="#" class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            <img src="{{ auth()->user()->profile_photo_url ?? '' }}" alt="{{ auth()->user()->name ?? '' }}" class="rounded-full h-20 w-20 object-cover" id="icon-user">
                        <div class="mx-1">
                            <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">{{ auth()->user()->name ?? 'no nombre' }}</h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email ?? 'no email'}}</p>
                        </div>
                    </a>
                    <hr class="border-gray-200 dark:border-gray-700 ">
                    
                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Perfil') }}
                    </x-dropdown-link>

                    <a href="{{ route('profile.likes',['section' => 'likes']) }}" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                        Mis libros
                    </a>

                    <a href="{{ route('profile.likes', ['section' => 'likes']) }}" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                        Likes
                    </a>
                    <a href="{{ route('profile.likes', ['section' => 'bookmarks']) }}" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                        Guardados
                    </a>
                    <hr class="border-gray-200 dark:border-gray-700 ">
                    @if (auth()->check() && auth()->user()->is_admin == 1)
                        <a href="{{route("admin.panel-control")}}" class="block px-4 py-3 text-sm text-gray-600 capitalize transition-colors duration-200 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                            Panel de control - Admin
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <x-dropdown-link href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">
                            {{ __('Cerrar sesion') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
