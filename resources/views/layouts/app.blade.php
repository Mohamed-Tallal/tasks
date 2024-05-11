<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- @vite('resources/css/app.css')-->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100" id="app">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @include('layouts.header')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
