<div class="box-log">
    @if (Route::has('login'))
        <div>
            @auth
                {{-- <a href="{{ url('/dashboard') }}" class="login-user">Dashboard</a> --}}
            @else
                <a href="{{ route('login') }}" class="login-user">Log in</a>

                {{-- @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="login-user">Register</a>
                @endif --}}
            @endauth
        </div>
        <img src="{{ asset('storage/svg/user.svg') }}" alt="icon-user" id="icon-user">
    @endif
</div>