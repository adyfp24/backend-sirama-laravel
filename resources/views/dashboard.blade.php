<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sirama | Dashboard</title>

    @if (session()->has('api_token'))
        <script>
            const apiToken = '{{ session('api_token') }}';
            localStorage.setItem('api_token', apiToken);
            console.log(apiToken);
        </script>
    @endif
</head>

<body>
    <form action="{{ Route('logout') }}" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>
    <a href="{{ url('/admin/podcast') }}">Podcast</a>
    <h1>test ini halaman dashboard</h1>
</body>

</html>
