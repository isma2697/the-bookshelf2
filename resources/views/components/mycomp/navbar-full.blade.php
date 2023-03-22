<div class="navbar-full">

    <div class="navbar-option navbar">
        <div class="icon-logo">
            <img src="{{ asset('storage/img/icon-logo.png') }}" alt="icon-logo" id="icon-logo">
        </div>
        <x-mycomp.user-session/>
    </div>

    <div class="navbar-options navbar">
        <div class="options">
            <ul class="dropdown-menu">

                <li>
                    <a href="/">Categoria</a>
                    <img src="{{ asset('storage/svg/arrow-down.svg') }}" alt="arrow-down" id="arrow-down1">
                    <div class="menu1">
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
                <div class="form-outline">
                  <input type="search" id="form1" class="form-control"  />
                </div>
                <button type="button" class="btn-search btn">
                    <img src="{{ asset('storage/svg/search.svg') }}" alt="icon-search">
                </button>
        </div>
    </div>

</div>