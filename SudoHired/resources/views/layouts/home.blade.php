<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DevJobs')</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logodev.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dev_theme.css') }}">
</head>

<body class="app-body">
    <header class="app-nav">
        <div class="container d-flex align-items-center justify-content-between py-3">
            <a class="brand d-flex align-items-center gap-2 text-decoration-none" href="{{ url('/') }}">
                <img class="brand-logo" src="{{ asset('img/logodev.png') }}" alt="DevJobs" width="70">
                <span class="text-gradient">DevJobs</span>
            </a>

            <nav class="d-flex align-items-center gap-3">
                <a class="nav-linkish" href="{{ route('companies.index') }}">Empresas</a>
                <a class="nav-linkish" href="{{ route('jobs.index') }}">Vagas</a>

                <!-- verifica se tem algum user logado e aparece o nome ou se nao estiver, mostra os botoes de login e registrar -->
                @auth
                    <span class="nav-muted">Olá, <b>{{ Auth::user()->name }}</b></span>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="btn btn-outline-custom btn-sm">Sair</button>
                    </form>
                @else
                    <a class="nav-linkish" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-neon-purple btn-sm" href="{{ route('register') }}">Registrar</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- onde o conteudo das paginas filhas vai aparecer -->
    <main class="app-main">
        @yield('content')
    </main>

    <footer class="app-footer">
    <div class="container py-5">
        <div class="row g-4 align-items-start footer-top">
            <div class="col-12 col-lg-4">
                <div class="d-flex align-items-center gap-2 mb-3">
                    <img class="brand-logo" src="{{ asset('img/logodev.png') }}" alt="DevJobs" width="70">
                    <span class="brand-name">DevJobs</span>
                </div>
                <p class="footer-muted mb-0">
                    Portal premium de vagas tech em Portugal. Conectamos talento com as melhores oportunidades.
                </p>
            </div>

            <!-- Links Rápidos -->
            <div class="col-6 col-lg-4 footer-col-center">
                <h6 class="footer-title">Links Rápidos</h6>
                <ul class="list-unstyled footer-links mb-0">
                    <li><a href="{{ route('companies.index') }}">Empresas</a></li>
                    <li><a href="{{ route('jobs.index') }}">Vagas</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-4 footer-col-right">
                <h6 class="footer-title">Social</h6>
                <ul class="list-unstyled footer-links mb-0">
                    <li><a href="#">LinkedIn</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">GitHub</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom mt-5 pt-4 text-center">
            <small class="footer-muted">© 2026 DevJobs. Design premium dark mode by Thais Lira</small>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
