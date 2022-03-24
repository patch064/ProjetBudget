<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@yield('css')
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ProjetBudget</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
       <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <link href="{{ asset('css/bulma.min.css') }}" rel="stylesheet" type="text/css" >
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- Page Content -->
                <main class="section">
                    <div class="container">
                        <body class="font-sans antialiased">
                        <div class="min-h-screen bg-gray-100">
                {{ $slot }}
                    </div>
                        </body>
                    </div>
            </main>
        </div>
    </body>
</html>


