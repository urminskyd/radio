<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Radio</title>

</head>

<body class="antialiased">
</body>
@forelse ($radios as $radio)
    <div>
        <a href="{{ route('radio.show', $radio) }}">{{ $radio->radio_url }}</a>
    </div>
@empty
    Zatiaľ nemáme žiadne rádio v databáze.
@endforelse

</html>
