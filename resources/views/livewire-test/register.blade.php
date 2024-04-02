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
<!-- <livewire:register /> -->
@livewire('register')
@livewireScripts
</body>
</html>
