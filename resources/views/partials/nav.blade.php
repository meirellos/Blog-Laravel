<div class="container-fluid">
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
        aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
        
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts') }}" rel="nofollow">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
        </ul>
        Bem vindo
        @if (auth()->guest())
            Visitante
        @else
            {{ auth()->user()->fullName }} | <a href="{{ route('logout') }}"> Logout</a>
        @endif

        <!--Icons-->
        <ul class="navbar-nav d-flex flex-row">
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" href="https://www.linkedin.com/in/vinicius-meirelles-4981501b4/" rel="nofollow"
                    target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" href="https://github.com/meirellos" rel="nofollow" target="_blank">
                    <i class="fab fa-github"></i>
                </a>
            </li>
        </ul>

    </div>
</div>
