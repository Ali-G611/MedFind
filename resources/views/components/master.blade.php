<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'MedFind') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="Source/capsule-solid-24.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">

</head>
<header id="header">
    @auth
        <nav id="nav">
            <a href="{{ route('user.show', auth()->user()) }}">Account</a>
        </nav>
    @endauth
    <i id="icon" class='bx bxs-capsule bx-rotate-180' style='color:#e2e2e2'></i>
    <span id="website">MedFind</span>
    <nav id="nav">
        <a href="/">Home</a>
        <a href="{{ route('items.index') }}">Request</a>
        <a href="{{ route('items.create') }}">Add</a>
    </nav>
</header>

<body>
    {{ $slot }}
</body>

<footer id="footer" style="">
    <a class="social" href="/dashboard" style="font-size: small;">DashBoard</a>
    <p id="copyright">you may not reproduce or communicate any of the content on this website, including files
        downloadable from this website, without the permission of the copyright owner.</p>
</footer>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</html>
