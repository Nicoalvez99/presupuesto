<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Graficos') }}
        </h2>
    </x-slot>

    <div class="sm:flex">
        <div class="w-screen sm:w-1/2 p-4">
            <canvas id="myChart"></canvas>
        </div>
        <div class="w-screen sm:w-1/2 p-4">
            <canvas id="myChartSemanal"></canvas>
        </div>
    </div>
    <div style="display: none;">
        <div class="col-12 col-sm-6">
            <p>Ventas del día domingo: <span id="domingo">{{ $gastosPorDiasSemana['domingo'] ?? 0 }}</span></p>
            <p>Ventas del día Lunes: <span id="lunes">{{ $gastosPorDiasSemana['lunes'] ?? 0 }}</span></p>
            <p>Ventas del día Martes: <span id="martes">{{ $gastosPorDiasSemana['martes'] ?? 0 }}</span></p>
            <p>Ventas del día Miercoles: <span id="miercoles">{{ $gastosPorDiasSemana['miércoles'] ?? 0 }}</span></p>
            <p>Ventas del día Jueves: <span id="jueves">{{ $gastosPorDiasSemana['jueves'] ?? 0 }}</span></p>
            <p>Ventas del día viernes: <span id="viernes">{{ $gastosPorDiasSemana['viernes'] ?? 0 }}</span></p>
            <p>Ventas del día sabado: <span id="sabado">{{ $gastosPorDiasSemana['sábado'] ?? 0 }}</span></p>
        </div>
        <div class="col-12 col-sm-6">
            <p>ventas del mes enero: <span id="enero">{{ $gastosPorMeses['January'] ?? 0 }}</span></p>
            <p>ventas del mes febrero: <span id="febrero">{{ $gastosPorMeses['February'] ?? 0 }}</span></p>
            <p>ventas del mes marzo: <span id="marzo">{{ $gastosPorMeses['March'] ?? 0 }}</span></p>
            <p>ventas del mes abril: <span id="abril">{{ $gastosPorMeses['April'] ?? 0 }}</span></p>
            <p>ventas del mes mayo: <span id="mayo">{{ $gastosPorMeses['May'] ?? 0 }}</span></p>
            <p>ventas del mes junio: <span id="junio">{{ $gastosPorMeses['June'] ?? 0 }}</span></p>
            <p>ventas del mes julio: <span id="julio">{{ $gastosPorMeses['July'] ?? 0 }}</span></p>
            <p>ventas del mes agosto: <span id="agosto">{{ $gastosPorMeses['August'] ?? 0 }}</span></p>
            <p>ventas del mes septiembre: <span id="septiembre">{{ $gastosPorMeses['September'] ?? 0 }}</span></p>
            <p>ventas del mes octubre: <span id="octubre">{{ $gastosPorMeses['October'] ?? 0 }}</span></p>
            <p>ventas del mes noviember: <span id="noviembre">{{ $gastosPorMeses['November'] ?? 0 }}</span></p>
            <p>ventas del mes diciembre: <span id="diciembre">{{ $gastosPorMeses['December'] ?? 0 }}</span></p>
        </div>
    </div>
</x-app-layout>