<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
            <main>

              alpine
              <div x-data="{ opp: true }">
              <div x-show="opp">0</div>
              <div x-show="!opp">openがfalse</div>
              <button class="px-4 py-2 bg-blue-400 text-white" x-on:click = "opp = !opp">button</button>
              </div>
              <div x-data="{ count: 0 }">
			<button @click="count++">Add</button>
			<span x-text="count">0</span>
            <div x-data="{ open: false }">
    <button x-on:click="open = ! open">Toggle Dropdown</button>

    <div x-show="open">
        Dropdown Contents...
    </div>
</div>
            </main>

        @livewireScripts
    </body>
</html>



