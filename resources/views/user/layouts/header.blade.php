<nav class="navbar navbar-expand-lg menu_one" id="sticky">
    <div class="container">
        <a class="navbar-brand sticky_logo" href="{{ route('home') }}">
            {{-- <img src="/theme/img/logo-w.png" srcset="/theme/img/logo-w2x.png 2x" alt="logo">
            <img src="/theme/img/logo.png" srcset="/theme/img/logo-2x.png 2x" alt="logo"> --}}
        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu_toggle">
                <span class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <span class="hamburger-cross">
                    <span></span>
                    <span></span>
                </span>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav menu ml-auto">
               
                <li class="nav-item dropdown submenu active">
                    <a href="{{ route('home') }}" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                    <i class="arrow_carrot-down_alt2 mobile_dropdown_icon" aria-hidden="true" data-toggle="dropdown"></i>
                </li>
               

            </ul>
            <a class="nav_btn" href="#">Blog</a>
        </div>
    </div>
</nav>