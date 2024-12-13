<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Sumba</title>
    <link rel="stylesheet" href="{{ asset('wisata/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>
<body>
    <nav>
        <a href="{{ route('categories.index') }}">Wisata Sumba Timur</a>
        <a href="#">Other Menu</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
