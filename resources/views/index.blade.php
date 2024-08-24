<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>

    <div class="container">
        <p>
            This is a simple to-do list app.
        </p>
        <a href="{{ url('/dashboard') }}">
            <button>
                Check out
            </button>
        </a>
    </div>

</body>
</html>
