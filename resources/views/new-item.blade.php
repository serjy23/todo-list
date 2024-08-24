<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} New Item</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

    <div class="navbar">
        <h3>
            New Item
        </h3>
        <div class="actions">
            <a href="{{ url('/') }}">
                <button>Return to dashboard</button>
            </a>
        </div>
    </div>

    <div class="items">
        <h3>New item details</h3>
        <input type="text" name="item-name" placeholder="Your new item name" required>
        <button>Submit</button>
    </div>

</body>
</html>
