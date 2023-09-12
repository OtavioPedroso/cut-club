<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', '') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rhodium+Libre&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="fixed w-full h-full">

    <script src="{{ mix('/js/app.js') }}"></script>
    <script>
        window.addEventListener('toast', ({ detail }) => {
                $toast.fire(detail.title, detail.message, detail.type);
            })

        window.addEventListener('alert', ({ detail }) => {
            Swal.fire(detail.title, detail.message, detail.type);
        })

        @if(session('toast'))
            @php
                $toast = json_decode(session('toast'));
            @endphp
            window.addEventListener('DOMContentLoaded', () => {
                $toast.fire('{{ $toast->title }}', '{{ $toast->message }}', '{{ $toast->type }}');
            });
            @php
                unset($toast);
            @endphp
        @endif

    </script>
</body>
</html>
