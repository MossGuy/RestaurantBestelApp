<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css'])
    <title>Main</title>
</head>
<body class="flex flex-col h-screen overflow-hidden">

    <!-- Navigatiebalk -->
    <nav class="bg-teal-600">
        <p class="text-lg px-4 py-1 shadow-lg">Restaurant Bestel App</p>
    </nav>

    <!-- Hoofdcontent, scrollbaar -->
    <main class="flex-grow overflow-hidden">
        <div class="mx-auto w-full sm:max-w-md md:max-w-lg lg:max-w-xl h-full p-6 bg-white overflow-y-auto">
            @yield('main')
        </div>
    </main>

</body>
</html>
