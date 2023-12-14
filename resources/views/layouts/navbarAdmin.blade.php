<nav class="navbar navbar-expand bg-success navbar-light sticky-top px-4 py-0">
    <a href="/" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars text-success"></i>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                @auth
                    <img class="rounded-circle me-lg-2" src="/img/{{ Auth::user()->profile_picture }}"
                        alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex text-light">
                        {{ Str::length(Auth::user()->username) > 10
                            ? Str::substr(Auth::user()->username, 0, 10) . '...'
                            : Auth::user()->username }}
                    </span>
                @endauth
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="/profile" class="dropdown-item">My Profile</a>
                <a href="/logout" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>
