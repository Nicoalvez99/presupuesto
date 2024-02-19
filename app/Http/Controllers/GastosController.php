<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gastos;
use Illuminate\Support\Facades\Auth;

class GastosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexFijos()
    {
        $user = Auth::user()->key;
        $gastosFijos = Gastos::where('user_key', $user)->where('tipoDeGasto', 'fijo')->get();
        return view('gastosFijos', [
            "gastos" => $gastosFijos
        ]);
    }
    public function indexVariables()
    {
        $user = Auth::user()->key;
        $gastosFijos = Gastos::where('user_key', $user)->where('tipoDeGasto', 'variable')->get();
        return view('gastosVariables', [
            "gastos" => $gastosFijos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();

        Gastos::create([
            "user_id" => $user->id,
            "descripcion" => $request->descripcion,
            "monto" => $request->monto,
            "estado" => $request->estado,
            "tipoDeGasto" => $request->tipoDeGasto,
            "user_key" => $user->key
        ]);
        return redirect()->route('gastosFijos')->with('status', 'Gasto agregado correctamente');
    }

    public function createVariables(Request $request)
    {
        $user = Auth::user();
        Gastos::create([
            "user_id" => $user->id,
            "descripcion" => $request->descripcion,
            "monto" => $request->monto,
            "estado" => $request->estado,
            "tipoDeGasto" => $request->tipoDeGasto,
            "user_key" => $user->key
        ]);
        return redirect()->route('gastosVariables')->with('status', 'Gasto agregado correctamente');;
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
    public function update(Gastos $gasto, Request $request)
    {
        $user = Auth::user()->id;
        $validatedData = $request->validate([
            'descripcion' => 'required',
            'monto' => 'required|numeric'
        ]);
        $gasto->update([
            'descripcion' => $validatedData['descripcion'],
            'monto' => $validatedData['monto'],
            'estado' => $request->estado
        ]);

        if ($request->tipoDeGasto == "fijo") {
            return redirect()->route('gastosFijos')->with('status', 'Gasto editado correctamente');
        } else {
            return redirect()->route('gastosVariables')->with('status', 'Gasto editado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gastos $gasto)
    {
        $gasto->delete();
        if ($gasto->tipoDeGasto == "fijo") {
            return redirect()->route('gastosFijos')->with('status', 'Gasto eliminado correctamente');
        } else {
            return redirect()->route('gastosVariables')->with('status', 'Gasto eliminado correctamente');
        }
    }
}
