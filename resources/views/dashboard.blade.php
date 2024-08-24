<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <div class="navbar">
        <h3>
            Dashboard
        </h3>
        <div class="actions">
            <a href="{{ url('/new') }}">
                <button>New item</button>
            </a>
            <a href="{{ url('/delete') }}">
                <button>Delete item</button>
            </a>
            <a href="{{ url('/') }}">
                <button>Return to index</button>
            </a>
        </div>
    </div>

    <div class="items">
        <h3>Items on list</h3>
        <ol>
            <li>This is an example item</li>
        </ol>
    </div>

</body>
</html>
