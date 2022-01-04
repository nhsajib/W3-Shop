<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    <script src="{{ mix('js/admin.js') }}" defer></script>

    <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <title>{{ config('app.name') }}</title>
</head>
<body>

  {{-- {{ Storage::get('example.txt'); }} --}}

  <div id="app">
    <index-component/>
  </div>
  
</body>
</html>