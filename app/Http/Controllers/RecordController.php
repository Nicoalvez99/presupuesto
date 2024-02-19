<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Records;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if (now()->dayOfWeek == Carbon::SUNDAY) {
            // Si es domingo, eliminar todos los registros de la tabla Historials
            Records::truncate();
            $totalHistorial = 0; // Establecer el totalHistorial en 0
        } else {
            // Obtener el totalHistorial normalmente si no es domingo
            $totalHistorial = Records::where('user_key', '=', $user->key)->sum('monto');
        }

        $gastosPorDia = Records::where('user_key', '=', $user->key)
            ->whereBetween('created_at', [now()->subWeek(), now()]) // Filtrar por la última semana
            ->selectRaw('DAYOFWEEK(created_at) as dia_semana, COUNT(*) as cantidad_gastos')
            ->groupBy('dia_semana')
            ->orderBy('dia_semana')
            ->get();

        // Crear un arreglo asociativo para almacenar las ventas por día de la semana
        $gastosPorDiasSemana = [];
        foreach ($gastosPorDia as $gasto) {
            // Mapa de día de la semana a su nombre
            $nombresDias = [
                1 => 'domingo',
                2 => 'lunes',
                3 => 'martes',
                4 => 'miércoles',
                5 => 'jueves',
                6 => 'viernes',
                7 => 'sábado',
            ];

            // Obtener el nombre del día
            $nombreDia = $nombresDias[$gasto->dia_semana];

            // Almacenar en el arreglo asociativo
            $gastosPorDiasSemana[$nombreDia] = $gasto->cantidad_gastos;
        }

        // Obtener gastos por mes del año actual
        $gastosPorMes = Records::where('user_key', '=', $user->key)
            ->whereYear('created_at', now()->year) // Filtrar por el año actual
            ->selectRaw('MONTH(created_at) as mes, COUNT(*) as cantidad_gastos')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        // Crear un arreglo asociativo para almacenar las ventas por mes
        $gastosPorMeses = [];
        foreach ($gastosPorMes as $gasto) {
            // Obtener el nombre del mes
            $nombreMes = date('F', mktime(0, 0, 0, $gasto->mes, 1));

            // Almacenar en el arreglo asociativo
            $gastosPorMeses[$nombreMes] = $gasto->cantidad_gastos;
        }

        return view('graficos', [
            "gastosPorDiasSemana" => $gastosPorDiasSemana,
            "gastosPorMeses" => $gastosPorMeses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
