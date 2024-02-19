<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Presupuesto') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <h4 id="monto" class="text-center text-white text-4xl text-sm-6xl">${{ number_format($totalIngresos) }}</h4>
        <h4 id="montoOculto" class="text-center text-white text-4xl text-sm-6xl">$****</h4>
    </div>
    @include('layouts.modals.modalPresupuesto')
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center">
                        <button type="button" id="botonGasto" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Calcular presupuesto</button>
                    </div>

                    <input type="text" data-table="table_id" class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 light-table-filter" placeholder="Busca por descripcion, fecha o monto">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table_id">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Check
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Monto
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Descripcion
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($gastos as $gasto)
                                <tr>
                                    <td class="check px-6 py-4"><input id="default-checkbox" checked type="checkbox" value="{{ $gasto->monto }}" class="checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></td>
                                    <td class="gasto px-6 py-4">${{ number_format($gasto->monto) }}</td>
                                    <td class="px-6 py-4">{{ $gasto->descripcion }}</td>
                                    <td class="px-6 py-4">{{ $gasto->tipoDeGasto }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let restarGastos = document.getElementById('botonGasto');

            restarGastos.addEventListener("click", () => {
                // Obtén el monto principal
                var montoPrincipal = parseFloat(document.getElementById('monto').innerText.replace('$', '').replace(',', ''));

                // Obtén todos los elementos con la clase "checkbox" seleccionados
                var checkboxes = document.querySelectorAll('.checkbox:checked');

                // Inicializa el total en 0
                var totalGastos = 0;

                // Itera sobre los elementos seleccionados y suma sus valores
                checkboxes.forEach(function(checkbox) {
                    totalGastos += parseFloat(checkbox.value);
                });

                // Calcula el resultado restando los gastos del monto principal
                var resultado = montoPrincipal - totalGastos;
                

                // Muestra el resultado en el elemento con id "resultado"
                document.getElementById('resultado').innerText = 'Resultado: $' + resultado;
            });
        });
    </script>
</x-app-layout>