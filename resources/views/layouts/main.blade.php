<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>Main</title>
</head>
<body class="min-h-screen flex flex-col bg-gray-50 text-gray-900">
    <!-- Navigatie -->
    <nav class="bg-teal-700">
        <p class="text-lg px-4 py-3 text-white font-semibold shadow-md">
            Restaurant Bestel App
        </p>
    </nav>

    <!-- Hoofdinhoud -->
    <main class="flex-grow">
        <div class="container mx-auto px-4 py-8">
            <div class="mx-auto w-full sm:max-w-md md:max-w-lg lg:max-w-xl p-6 bg-stone-200">
                @yield('main')
            </div>
        </div>
    </main>
</body>
</html>
