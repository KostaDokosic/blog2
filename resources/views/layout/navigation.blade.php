<nav class="navbar navbar-expand-lg bg-body-tertiary container">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    <li ass="nav-item">
                        <a class="nav-link active" aria-current="page" href="/createpost">Create post</a>
                    </li>
                    <li ass="nav-item">
                        <a class="nav-link active" aria-current="page" href="/signout">Sign out</a>
                    </li>
                @endauth
                @if (!auth()->check())
                    <li ass="nav-item">
                        <a class="nav-link active" aria-current="page" href="/signin">Sign in</a>
                    </li>
                    <li ass="nav-item">
                        <a class="nav-link active" aria-current="page" href="/signup">Sign up</a>
                    </li>
                @endif


            </ul>
            <div class="d-flex">
                @auth
                    <h4>
                        {{ auth()->user()->name }}
                    </h4>
                @endauth
                @if (!auth()->check())
                    Not Authentificated
                @endif
            </div>
        </div>
    </div>
</nav>
