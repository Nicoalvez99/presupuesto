<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Montos;
use App\Models\Records;
use App\Models\Notifications;
use App\Models\Gastos;
use App\Models\User;
use App\Models\Ingresos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class MontoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user()->id;
        $userKey = Auth::user()->key;
        $records = Records::where('user_key', '=', $userKey)->latest()->take(5)->get();
        $montos = Montos::where('user_key', '=', $userKey)->get();

        $totalMonto = Montos::where('user_key', '=', $userKey)->get("monto");
        $totalMontoDecrypt = Crypt::decryptString($totalMonto[0]["monto"]);
        
        $notifications = Notifications::where('key', '=', $userKey)->get();

        //dd($notificaciones);
        return view('dashboard', [
            "totalMonto" => $totalMontoDecrypt,
            "montos" => $montos,
            "records" => $records,
            "notifications" => $notifications
        ]);
    }
    public function indexHistorial()
    {
        $user = Auth::user()->key;
        $records = Records::where('user_key', '=', $user)->orderByDesc('created_at')->get();
        return view('historial', [
            "records" => $records
        ]);
    }
    public function indexPresupuesto()
    {
        $user = Auth::user()->id;
        $userKey = Auth::user()->key;
        $montos = Montos::where('user_key', '=', $userKey)->get();
        $gastos = Gastos::where('user_key', '=', $userKey)->get();
        $ingresos = Ingresos::where('user_key', '=', $userKey)->get();
        $totalIngresos = 0;
        foreach($ingresos as $ingreso){
            $totalIngresos = $totalIngresos + $ingreso->monto;

        }
        return view('presupuesto', [
            "montos" => $montos,
            "gastos" => $gastos,
            "totalIngresos" => $totalIngresos
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
    public function update(Request $request, Montos $monto)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required',
            'monto' => 'required|numeric',
            'tipoDeMovimiento' => 'required'
        ]);
        if($validatedData["tipoDeMovimiento"] == 'entrada'){
            $user = Auth::user();
            $montoAntiguo = Montos::where('user_key', '=', $user->key)->get('monto');
            $idUserMontos = Montos::where('user_id', '=', $user->id)->get('user_id');
            $user_id = $idUserMontos[0]['user_id'];
            $user_name = User::where('id', '=', $user_id)->get('name');
            
            $montoAntiguoDecrypt = Crypt::decryptString($montoAntiguo[0]["monto"]);
            $montoActual = $montoAntiguoDecrypt + $validatedData["monto"];

            $montoCifrado = Crypt::encryptString($montoActual);
            
            Records::create([
                "user_name" => $user_name[0]["name"],
                "descripcion" => $validatedData["descripcion"],
                "user_key" => $user->key,
                "monto" => $validatedData["monto"],
                "tipoDeMovimiento" => $validatedData["tipoDeMovimiento"]
            ]);

            Montos::where('user_key', $user->key)->update(["monto" => $montoCifrado]);
            
            return redirect()->route('dashboard')->with('status', 'Capital actualizado correctamente.');
        } else {
            $user = Auth::user();
            $montoAntiguo = Montos::where('user_key', '=', $user->key)->get('monto');
            $idUserMontos = Montos::where('user_id', '=', $user->id)->get('user_id');
            $user_id = $idUserMontos[0]['user_id'];
            $user_name = User::where('id', '=', $user_id)->get('name');

            $montoAntiguoDecrypt = Crypt::decryptString($montoAntiguo[0]["monto"]);
            $montoActual = $montoAntiguoDecrypt - $validatedData["monto"];

            $montoCifrado = Crypt::encryptString($montoActual);

            Records::create([
                "user_name" => $user_name[0]["name"],
                "descripcion" => $validatedData["descripcion"],
                "user_key" => $user->key,
                "monto" => $validatedData["monto"],
                "tipoDeMovimiento" => $validatedData["tipoDeMovimiento"]
            ]);

            Montos::where('user_key', $user->key)->update(["monto" => $montoCifrado]);
            
            return redirect()->route('dashboard')->with('status', 'Capital actualizado correctamente.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
