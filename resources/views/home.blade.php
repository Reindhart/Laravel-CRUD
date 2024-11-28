<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <!-- Encabezado -->
        <header class="flex justify-between items-center py-6">
            <h1 class="text-3xl font-bold">Bienvenido a mi Proyecto Final</h1>
            <div>
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                @endif
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-blue-500 hover:underline">Register</a>
                @endif
            </div>
        </header>

        <!-- Contenido Principal -->
        <main class="mt-10 text-center">
            <h2 class="text-2xl font-semibold">Explora nuestra aplicación</h2>
            <p class="mt-4 text-gray-600">Crea una cuenta o inicia sesión para comenzar.</p>
        </main>

        <!-- Pie de Página -->
        <footer class="mt-10 text-center text-gray-500">
            &copy; {{ date('Y') }} Penguinapple los derechos reservados.
        </footer>
    </div>
</body>
</html>
