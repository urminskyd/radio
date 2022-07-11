<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Radio</title>

</head>

<body class="antialiased">
</body>
@forelse ($songs as $song)
    <div>
        {{ $song->created_at . ' - ' . $song->time . ' ' . $song->name }}
    </div>
@empty
    Zatiaľ nemáme žiadne piesne v databáze.
@endforelse

{{ $songs->links() }}

</html>
