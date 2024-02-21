<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ahorros;
class AhorroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->key;
        $ahorros = Ahorros::where('user_key', $user)->get();
        $totalAhorros = Ahorros::where('user_key', $user)->sum('monto');
        
        return view('ahorros', [
            "totalAhorros" => $totalAhorros,
            "ahorros" => $ahorros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userKey = Auth::user()->key;
        Ahorros::create([
            "monto" => $request->monto,
            "user_key" => $userKey
        ]);

        return redirect()->route('ahorros')->with('status', 'Ahorro creado exitosamente');
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
    public function update(Request $request, Ahorros $ahorro)
    {
        $ahorro->update([
            "monto" => $request->monto
        ]);
        return redirect()->route('ahorros')->with('status', 'Ahorro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
