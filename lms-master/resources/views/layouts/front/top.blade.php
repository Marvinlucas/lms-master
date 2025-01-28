<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{ route('home') }}" class="logo-link">
        <img class="logo-img logo-img-top1" src="{{ asset('front/img/guru-logo-white.png') }}" alt="Logo">
        <img class="logo-img logo-img-top2" src="{{ asset('img/logo/guru-logo.png') }}" alt="Logo" width="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
            <a href="{{ route('front.courses') }}" class="nav-item nav-link">Courses</a>
           {{-- <a href="{{ route('front.plans') }}" class="nav-item nav-link">Plans</a> --}}
            <a href="{{ route('front.about') }}" class="nav-item nav-link">About</a>
            <a href="{{ route('front.contact') }}" class="nav-item nav-link">Contact</a>
        </div>
        @if (Route::has('login'))
        @auth
        <a href="{{ route('dashboard') }}" class="btn rounded-pill py-2 px-4 ms-3  d-lg-block">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="btn rounded-pill py-2 px-4 ms-3  d-lg-block">Login</a>    
        @endauth
        @endif
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.addEventListener("scroll", function() {
            var navbar = document.querySelector(".navbar");
            navbar.classList.toggle("sticky-top", window.scrollY > 0);
        });
    });
</script>