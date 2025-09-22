<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Decorpic</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>
    <div class="mx-10 flex flex-col items-center min-h-screen">
        @include('shared.success-message')
        @include('layout.nav')
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            @yield('content')
        </div>
    </div>
</body>

</html>
