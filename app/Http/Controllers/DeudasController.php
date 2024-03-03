<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deudas;
use Illuminate\Support\Facades\Auth;
class DeudasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $deudas = Deudas::where('key', '=', $user->key)->get();
        $totalDeudas = Deudas::where('key', $user->key)->sum('monto');
        return view('deudas', [
            "deudas" => $deudas,
            "totalDeudas" => $totalDeudas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userKey = Auth::user()->key;
        Deudas::create([
            "monto" => $request->monto,
            "key" => $userKey
        ]);

        return redirect()->route('deudas')->with('status', 'Deuda subida correctamente.');
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
    public function destroy(Deudas $deuda)
    {
        $deuda->delete();
        return redirect()->route('deudas')->with('status', 'Deuda eliminada correctamente');
    }
}
