<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Prolinko</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.PNG') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    body {
        background: rgb(12, 4, 19);
        background: linear-gradient(90deg, rgba(12, 4, 19, 1) 49%, rgba(24, 9, 36, 1) 70%, rgba(38, 5, 66, 1) 100%, rgba(38, 5, 66, 1) 100%);
    }

    main {
        height: 100vh;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-left: 40px;
    }

    @media (max-width: 700px) {
        .imagen {
            display: none;
        }

        .container {
            margin: 50px;
            padding-left: 0px;
        }

        .titulo,
        .subtitulo,
        .registro {
            text-align: center;
        }
    }
</style>

<body>
    <header>
        <nav class="">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{ route('welcome') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo.PNG') }}" class="h-9" alt="Profinance Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Prolinko</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0">
                        <li>
                            <a href="#" class="block py-2 px-3 text-white rounded md:bg-transparent md:p-0" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                        </li>
                        @if(Route::has('login'))
                        @auth
                        <li>
                            <a href="{{ url('/dashboard') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dashboard</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('login') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                        </li>
                        @endif
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="mx-5 h-full">
        <div class="flex">
            <div class="w-full sm:w-1/2 container" data-aos="fade-up">
                <div class="block">
                    <h1 class="titulo mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-4xl lg:text-5xl dark:text-white">Administración financiera,<br>construye tu prosperidad.</h1>
                    <p class="subtitulo text-slate-400 my-5">Optimiza tu economía familiar: controla gastos, ahorra estratégicamente, logra metas. Descubre la tranquilidad financiera con nuestra aplicación innovadora.</p>
                    <div class="text-center sm:text-start">
                        <a href="{{ route('register') }}" class="w-auto sm:text-start relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                            <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                Registrate
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="imagen w-1/2" data-aos="fade-left">
                <img src="{{ asset('images/portada01.png') }}" class="mx-auto" width="300" alt="">
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>