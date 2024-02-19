<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ingresos;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexActivos()
    {
        $user = Auth::user()->key;
        $ingresosActivos = Ingresos::where('user_key', $user)->where('tipoDeIngreso', 'activo')->get();
        return view('ingresosActivos', [
            "ingresos" => $ingresosActivos
        ]);
    }
    public function indexPasivos()
    {
        $user = Auth::user()->key;
        $ingresosPasivos = Ingresos::where('user_key', $user)->where('tipoDeIngreso', 'pasivo')->get();
        return view('ingresosPasivos', [
            "ingresos" => $ingresosPasivos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = Auth::user();

        Ingresos::create([
            "user_id" => $user->id,
            "descripcion" => $request->descripcion,
            "monto" => $request->monto,
            "tipoDeIngreso" => $request->tipoDeIngreso,
            "user_key" => $user->key
        ]);
        if ($request->tipoDeIngreso == 'activo') {
            return redirect()->route('ingresoActivo')->with('status', 'Ingreso agregado correctamente');
        } else {
            return redirect()->route('ingresoPasivo')->with('status', 'Ingreso agregado correctamente');
        }
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
    public function update(Request $request, Ingresos $ingreso)
    {
        $user = Auth::user()->id;
        $validatedData = $request->validate([
            'descripcion' => 'required',
            'monto' => 'required|numeric'
        ]);
        $ingreso->update([
            'descripcion' => $validatedData['descripcion'],
            'monto' => $validatedData['monto'],
        ]);

        if ($ingreso->tipoDeIngreso == "activo") {
            return redirect()->route('ingresoActivo')->with('status', 'Ingreso editado correctamente');
        } else {
            return redirect()->route('ingresoPasivo')->with('status', 'Ingreso editado correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingresos $ingreso)
    {
        $ingreso->delete();

        if ($ingreso->tipoDeIngreso == 'activo') {
            return redirect()->route('ingresoActivo')->with('status', 'Ingreso eliminado correctamente');
        } else {
            return redirect()->route('ingresoPasivo')->with('status', 'Ingreso eliminado correctamente');
        }
    }
}
