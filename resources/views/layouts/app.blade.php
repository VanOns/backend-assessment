<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Van Ons Assessment</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cream font-sans text-ink antialiased selection:bg-brand selection:text-white">
    <header class="border-b border-ink/10">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-5">
            <a href="/" class="flex items-center gap-3">
                <span class="text-lg font-semibold tracking-tight">Backend Assessment</span>
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-6xl px-6 py-12">
        @yield('content')
    </main>

    <footer class="mt-20 bg-ink text-neutral-400">
        <div class="mx-auto flex max-w-6xl flex-col gap-3 px-6 py-12 text-center">
            <p class="text-sm">&copy; {{ date('Y') }} Van Ons</p>
        </div>
    </footer>
</body>
</html>
