<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Finanzas Familiares - Prolinko</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.PNG') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    body {
        background: rgb(12, 4, 19);
        background: linear-gradient(90deg, rgba(12, 4, 19, 1) 49%, rgba(24, 9, 36, 1) 70%, rgba(38, 5, 66, 1) 100%, rgba(38, 5, 66, 1) 100%);
        background-size: 200% 100%;
        animation: gradientAnimation 5s linear infinite;
    }
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    i {
        background-color: #191a1a;
        padding: 7px;
        border-radius: 2px;
        color: #06b6d4;
        font-size: 20px;
    }

    .containerDos {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-left: 40px;
    }

    main {
        height: 100vh;
    }

    .imagenDos {
        display: none;
    }

    .titulo-color {
        color: #06b6d4;
    }

    .container {
        width: 100%;
        height: 100%;
        --color: rgba(114, 114, 114, 0.3);
        background-color: #191a1a;
        background-image: linear-gradient(0deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent),
            linear-gradient(90deg, transparent 24%, var(--color) 25%, var(--color) 26%, transparent 27%, transparent 74%, var(--color) 75%, var(--color) 76%, transparent 77%, transparent);
        background-size: 55px 55px;
        border-radius: 10px;
    }

    @media (max-width: 700px) {
        .imagen {
            display: none;
        }

        .imagenDos {
            display: block;
        }

        .containerDos {
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
                            <a href="#servicios" class="block py-2 px-3 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
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
                    <h1 class="titulo mb-4 text-4xl font-extrabold leading-none tracking-tight text-white md:text-4xl lg:text-5xl dark:text-white">Administración financiera,<br>construye tu <span class="titulo-color">prosperidad</span>.</h1>
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
        <div class="imagenDos w-full mb-5" data-aos="fade-up">
            <img src="{{ asset('portada02.png') }}" class="mx-auto" width="240" alt="">
        </div>
        <section class="w-full my-10 h-full" id="servicios">
            <div class="text-center" data-aos="fade-up" >
                <h2
                    class="titulo mb-4 text-3xl font-extrabold leading-none tracking-tight text-white md:text-3xl lg:text-4xl dark:text-white">
                    Nuestros servicios</h2>
            </div>
            <div class="sm:flex">
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-list-columns"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Historial</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Gestiona exhaustivamente tu historial financiero: gastos e ingresos registrados.</p>
                </div>
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-check2-circle"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Presupuesto</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Calcula tu presupuesto equilibrando ingresos y gastos.</p>

                </div>
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-graph-down"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Gastos</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Organiza y clasifica gastos fijos y variables con su respectivo estatus.</p>

                </div>
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-graph-up"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Ingresos</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Registra y modifica ingresos activos y pasivos con facilidad.</p>

                </div>

            </div>
            <div class="sm:flex">
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-bar-chart"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Gráficos</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Analiza gráficos semanales y mensuales para evaluar tus gastos.</p>

                </div>
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-cash"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Ahorros</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Mantén un seguimiento detallado de tus ahorros financieros.</p>

                </div>
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-stop-btn"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Deudas</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Planifica estratégicamente tus deudas para un manejo efectivo.</p>

                </div>
                <div class="w-full sm:w-1/4 text-center my-12 px-5" data-aos="fade-up">
                    <i class="bi bi-people"></i>
                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white my-2">Grupos</h4>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Conecta tu cuenta de manera segura con otros miembros familiares.</p>

                </div>
            </div>
        </section>
        <section class="container w-full sm:w-1/2 p-5 my-5">
            <ol class="relative border-s border-gray-200 dark:border-gray-700">
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Paso 1</time>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Obtené la Key de la cuenta a la que queres vincularte:
                    </h3>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">La key o llave es una clave alfabética de ocho dígitos única y personal, pedila cuando quieras vincular tu cuenta con otra persona.</p>
                </li>
                <li class="mb-10 ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Paso 2</time>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Solicitá la vinculación:</h3>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Luego de que obtengas la key copiala en el siguiente campo y hace click en el botón "Solicitar".</p>
                </li>
                <li class="ms-4">
                    <div
                        class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700">
                    </div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Paso 3</time>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Esperá la aceptación de vinculación:
                    </h3>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Luego a la persona que queres vincular tu cuenta le llegará una notificación que deberá aceptar o rechazar.</p>
                </li>
            </ol>
        </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
