<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ingresos pasivos') }}
        </h2>
    </x-slot>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-center my-2 py-2">
                <button type="button" data-modal-target="ingresos-pasivos-modal" data-modal-toggle="ingresos-pasivos-modal" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+ Agregar</button>
            </div>
        </div>
        
        @foreach($ingresos as $ingreso)

        <div class="mx-auto flex items-center w-full max-w-xs px-4 py-2 text-gray-500 rounded-lg shadow dark:text-gray-400" data-aos="fade-up">
            <div id="toast-default" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-blue-500 bg-blue-100 rounded-lg dark:bg-blue-800 dark:text-blue-200">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.147 15.085a7.159 7.159 0 0 1-6.189 3.307A6.713 6.713 0 0 1 3.1 15.444c-2.679-4.513.287-8.737.888-9.548A4.373 4.373 0 0 0 5 1.608c1.287.953 6.445 3.218 5.537 10.5 1.5-1.122 2.706-3.01 2.853-6.14 1.433 1.049 3.993 5.395 1.757 9.117Z" />
                    </svg>
                    <span class="sr-only">Fire icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ $ingreso->descripcion }}: ${{ number_format($ingreso->monto) }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <i data-modal-target="gastos-fijos-update{{ $ingreso->descripcion }}" data-modal-toggle="gastos-fijos-update{{ $ingreso->descripcion }}" class="bi bi-pencil-square"></i>
                    <div class="mx-2">
                        <form action="{{ route('ingreso.delete', $ingreso) }}" method="post">
                            @csrf @method('delete')
                            <i class="bi bi-trash" onclick="event.preventDefault(); this.closest('form').submit();"></i>
                        </form>
                    </div>
                </button>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>