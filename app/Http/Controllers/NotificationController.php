<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = Auth::user();
        $usuarios = User::where('key', '=', $request->keyOtherUser)->get();
        foreach ($usuarios as $usuario) {
            $idDelUsuarioUno = $usuario->id;
        }
        Notifications::create([
            "id_user" => $user->id,
            "nombre" => $user->name,
            "key" => $request->keyOtherUser,
            "id_user_dos" => $idDelUsuarioUno
        ]);
        return redirect()->route('dashboard')->with('status', 'Solicitud enviada correctamente');
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
    public function getNotification()
    {
        try {
            // Obtén las notificaciones (ajusta según tu lógica)
            $userKey = Auth::user()->key;
            $notifications = Notifications::where('key', '=', $userKey)->get();

            // Retorna las notificaciones en formato JSON
            return response()->json(['notifications' => $notifications]);
        } catch (\Exception $e) {
            // Retorna un error en caso de excepción
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    public function update(Request $request, Notifications $notification)
    {
        $userKey = Auth::user()->key;

        // Asegúrate de que el usuario actual es el destinatario correcto de la notificación

        $user2 = User::find($request->idUserDos);
        if ($user2) {
            $user2->update([
                "key" => $userKey,
            ]);

            // Elimina la notificación después de procesarla
            $notification->where('key', '=', $userKey)->delete();

            return redirect()->route('dashboard')->with('status', 'Vinculación realizada.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notifications $notification, Request $request)
    {
        $idNotification = $request->idNotification;

        // Buscar la notificación por el id
        $notification = Notifications::find($idNotification);

        // Verificar si la notificación existe antes de intentar eliminarla
        if ($notification) {
            // Eliminar la notificación
            $notification->delete();

            // Redirigir con un mensaje de éxito
            return redirect()->route('dashboard')->with('status', 'Solicitud rechazada.');
        } else {
            // Si la notificación no existe, redirigir con un mensaje de error
            return redirect()->route('dashboard')->with('error', 'La notificación no existe.');
        }
    }
}
