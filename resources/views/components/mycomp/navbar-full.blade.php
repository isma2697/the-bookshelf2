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
                    <a href="/">Categoria</a>
                    <img src="{{ asset('storage/svg/arrow-down.svg') }}" alt="arrow-down" id="arrow-down1">
                    <x-mycomp.menu-category/>
                </li>

                <li>
                    <a href="/acerca-de">Editoriales</a>
                    <img src="{{ asset('storage/svg/arrow-down.svg') }}" alt="arrow-down" id="arrow-down2">

                    <div class="menu2">
                        <ul class="dropdown-submenu">
                            <li><a href="/">Inicio</a></li>
                            <li><a href="/acerca-de">Acerca de</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                            <li><a href="/">Inicio</a></li>
                            <li><a href="/acerca-de">Acerca de</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                            <li><a href="/contacto">Contacto</a></li>
                        </ul>
                    </div>
                </li>

                <li><a href="/popular">Lo más popular</a></li>
            </ul>

        </div>
        <div class="search">
            <livewire:book-search>
        </div>
    </div>

</div>
