<div class="box-log">
    @if (Route::has('login'))
        <div>
            @auth
                @if (auth()->check())
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="rounded-full h-20 w-20 object-cover" id="icon-user">
                @endif                
            @else
                <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                    <a href="{{ route('login') }}"  class="block px-4 py-2 mt-2 text-sm text-gray-600 md:mt-0 hover:text-green-600 focus:outline-none focus:shadow-outline">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"  class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-green-700 rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-green-900 active:bg-gray-800 active:text-white focus-visible:outline-black">
                        Sign up
                    </a>
                </div>
            @endauth
        </div>
    @endif
</div>
            
