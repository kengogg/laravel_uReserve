<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
livewireテスト
<div>
    @if (session()->has('message'))
    <div class="">
        {{ session('message') }}
    </div>
    @endif
</div>
<livewire:counter />
<!-- @livewire('counter') -->
@livewireScripts
</body>
</html>
