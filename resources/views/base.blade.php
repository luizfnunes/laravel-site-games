<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Games</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <h2 class="is-size-4 is-uppercase has-text-weight-semibold icon-text"><img class="icon is-large" src="{{ asset('image/logo.svg') }}" /> <span>Games</span></h2>
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarMain">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarMain" class="navbar-menu">
                <div class="navbar-start">
                    <p class="navbar-item">
                        A project made with Laravel
                    </p>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a href="{{ route('login') }}" class="button is-light">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="footer has-background-black mt-3">
        <div class="content has-text-centered">
            <p>
                <strong>Games</strong> by <a href="https://github.com/luizfnunes" target="_blank">Luiz F. Nunes</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. Created with <a href="https://laravel.com/" target="_blank">Laravel</a> and <a href="https://bulma.io/" target="_blank">Bulma</a>.
            </p>
        </div>
    </footer>
</body>

</html>
