<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Prolinko') }}</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @include('layouts.modals.modalAgregar')
    @include('layouts.modals.modalGastoFijo')
    @include('layouts.modals.modalGastoVariable')
    @include('layouts.modals.modalIngresoActivo')
    @include('layouts.modals.modalIngresoPasivo')
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="desktop">
            @include('layouts.navigation')

        </div>
        <div class="mobile">
            @include('layouts.navigationResponsive')
        </div>

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        @include('layouts.alerts.session-status')
        @include('layouts.partials.notification')
    </div>
    <script>
        $(document).ready(function() {
            function loadNotifications() {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/notification',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Actualiza la vista con las nuevas notificaciones
                        $('#notifications-container').empty(); // Borra las notificaciones actuales
                        if (data.notifications.length > 0) {
                            data.notifications.forEach(function(notification) {
                                // Crea un nuevo elemento HTML para cada notificación y agrégalo al contenedor
                                if ($('#toast-interactive' + notification.id).length == 0) {
                                    var notificationHtml = `
                                <div id="toast-interactive${ notification.id }" class="w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:bg-gray-800 dark:text-gray-400" role="alert">
                                    <div class="flex">
                                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                                            </svg>
                                            <span class="sr-only">Refresh icon</span>
                                        </div>
                                        <form id="formulario" action="{{ route('notification.accept') }}" method="post">
                                            <input type="hidden" name="_token" value="${csrfToken}">
                                            <div class="ms-3 text-sm font-normal">
                                                <div style="display: none;">
                                                    <input type="number" name="idUserDos" value="${notification.id_user}">
                                                </div>
                                                <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">Solicitud de vinculación</span>
                                                <div class="mb-2 text-sm font-normal">Hola! ${notification.nombre} te ha enviado una solicitud para vinculación de cuenta.</div>
                                                <div class="grid grid-cols-2 gap-2">
                                                    <div>
                                                        <button type="submit" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Aceptar</a>
                                                    </div>
                                                    </form>
                                                    <form action="{{ route('notification.delete') }}" method="post">
                                                        <input type="hidden" name="_token" value="${csrfToken}">
                                                        <div style="display: none;">
                                                            <input type="number" name="idNotification" value="${notification.id}">
                                                        </div>
                                                        <div>
                                                            <button type="submit" class="inline-flex justify-center w-full px-2 py-1.5 text-xs font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Rechazar</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        
                                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white items-center justify-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-interactive${notification.id}" aria-label="Close">
                                            <span class="sr-only">Close</span>
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            `;
                                    $('#notifications-container').append(notificationHtml);
                                }
                            });

                        } else {
                            // Si no hay notificaciones, puedes mostrar un mensaje o realizar otra acción
                        }
                    },
                    error: function() {
                        console.log('Error al cargar las notificaciones.');
                    }
                });
            }

            // Carga las notificaciones al cargar la página
            loadNotifications();

            // Configura una recarga periódica de notificaciones (por ejemplo, cada 30 segundos)
            setInterval(loadNotifications, 5000); // Intervalo en milisegundos
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/chartMensual.js') }}"></script>
    <script src="{{ asset('js/chartSemanal.js') }}"></script>
    <script src="{{ asset('js/buscador.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>