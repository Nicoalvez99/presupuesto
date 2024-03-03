<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador') }}
        </h2>
    </x-slot>

    <div class="pb-12 mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <input type="text" data-table="table_id" class="my-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 light-table-filter" placeholder="Busca por nombre, email o tipo de usuario.">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table_id">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tipo de usuario
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Editar
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                @include('layouts.modals.modalAdministrador')
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $user->name }}</td>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->email }}</th>
                                    <td>{{ $user->tipoDeUsuario }}</td>
                                    <td><i data-modal-target="ahorro-update{{ $user->id }}" data-modal-toggle="ahorro-update{{ $user->id }}" style="cursor:pointer;" class="bi bi-pencil-square"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>