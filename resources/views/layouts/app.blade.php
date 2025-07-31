<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Aplikasi Nisya')</title>

        <!-- Bootstrap 5.3 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Additional CSS -->
        @stack('styles')
    </head>
    <body class="d-flex flex-column min-vh-100">
        <header class="bg-success text-white py-3">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h4 mb-0">Aplikasi Nisya</h1>
                    <nav>
                        <ul class="nav">
                            <li class="nav-item"><a href="{{ route('index.buku') }}" class="nav-link text-white">Home</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white">Features</a></li>
                            <li class="nav-item"><a href="#" class="nav-link text-white">About</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <main class="flex-grow-1 py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="bg-dark text-white py-3 mt-auto">
            <div class="container text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Aplikasi Nisya. All rights reserved.</p>
            </div>
        </footer>

        <!-- Bootstrap 5.3 JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Additional JS -->
        @stack('scripts')
    </body>
</html>
