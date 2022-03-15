<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="/css/app.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>

</head>
<body>

<header>
    @include('components.nav')
</header>

<main>
    @yield('content')
</main>

<div>
    @include('components.footer')
</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="/js/app.js"></script>

</body>
</html>
