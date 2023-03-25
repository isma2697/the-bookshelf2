<div class="box-log">
    @if (Route::has('login'))
        <div>
            @auth
                {{-- <a href="{{ url('/dashboard') }}" class="login-user">Dashboard</a> --}}
                
            @else
                {{-- <a href="{{ route('login') }}" class="login-user">Log in</a> --}}
                <div class="inline-flex items-center gap-2 list-none lg:ml-auto"s>
                    <a href="{{ route('login') }}"  class="block px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}"  class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-black rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-gray-700 active:bg-gray-800 active:text-white focus-visible:outline-black">
                        Sign up
                    </a>
                </div>
                
            @endauth
            <img src="{{ asset('storage/svg/user.svg') }}" alt="icon-user" id="icon-user">
        </div>
    @endif
</div>
            
            
{{-- @if (Route::has('register'))
    <a href="{{ route('register') }}" class="login-user">Register</a>
@endif --}}

{{-- <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
    <button class="block px-4 py-2 mt-2 text-sm text-gray-500 md:mt-0 hover:text-blue-600 focus:outline-none focus:shadow-outline">
      Sign in
    </button>
    <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white bg-black rounded-full group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-gray-700 active:bg-gray-800 active:text-white focus-visible:outline-black">
      Sign up
    </button>
  </div> --}}