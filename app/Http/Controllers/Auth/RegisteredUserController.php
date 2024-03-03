<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Montos;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        function generateRandomKey($length = 15) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $randomKey = '';
        
            for ($i = 0; $i < $length; $i++) {
                $randomKey .= $characters[rand(0, strlen($characters) - 1)];
            }
        
            return $randomKey;
        }
        $randomKey = generateRandomKey();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'key' => $randomKey,
            'password' => Hash::make($request->password),
            'tipoDeUsuario' => 'Simple'
        ]);

        Montos::create([
            'user_id' => $user->id,
            'monto' => 0,
            'user_key' => $user->key
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
