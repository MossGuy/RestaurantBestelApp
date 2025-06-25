<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>Main</title>
</head>
<body>
    <nav class="bg-teal-700">
        <p class="text-lg px-4 py-1 shadow-lg">Restaurant Bestel App</p>
    </nav>

    <main class="flex-grow">
        <div class="container mx-auto px-4 py-8">
            @yield('main')
        </div>
    </main>
</body>
</html>