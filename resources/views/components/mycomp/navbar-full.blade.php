<div class="navbar-full">

    <div class="navbar-option navbar">
        <div class="icon-logo">
            <a href="{{ route('books.principal')}}">
                <img src="{{ asset('storage/img/icon-logo.png') }}" alt="icon-logo" id="icon-logo">
            </a>
        </div>
        <x-mycomp.user-session/>
    </div>

    <div class="navbar-options navbar">
        <div class="options">
            <ul class="dropdown-menu">

                <li>
                    <p>Categoria</p>
                    <img src="{{ asset('storage/svg/arrow-down.svg') }}" alt="arrow-down" id="arrow-down1">
                    <x-mycomp.menu-category/>
                </li>

                <li>
                    <p>Editoriales</p>
                    <img src="{{ asset('storage/svg/arrow-down.svg') }}" alt="arrow-down" id="arrow-down2">
                    {{-- <x-mycomp.menu-category/> --}}
                </li>

                <li><a href="/popular">Lo más popular</a></li>
            </ul>

        </div>
        <div class="search">
            <livewire:book-search>
        </div>
    </div>

</div>
