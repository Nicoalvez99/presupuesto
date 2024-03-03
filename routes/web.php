<?php

use App\Http\Controllers\GastosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MontoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\AhorroController;
use App\Http\Controllers\DeudasController;
use App\Http\Controllers\DeudasControllerController;
use App\Http\Controllers\NotificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/graficos', [RecordController::class, 'index'])->middleware(['auth', 'verified', 'premium'])->name('graficos');
Route::get('/dashboard', [MontoController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/historial', [MontoController::class, 'indexHistorial'])->middleware(['auth', 'verified', 'premium'])->name('historial');
Route::get('gastos-fijos', [GastosController::class, 'indexFijos'])->middleware(['auth', 'verified'])->name('gastosFijos');
Route::get('gastos-variables', [GastosController::class, 'indexVariables'])->middleware(['auth', 'verified'])->name('gastosVariables');
Route::get('/presupuestos', [MontoController::class, 'indexPresupuesto'])->middleware(['auth', 'verified', 'premium'])->name('presupuesto');
Route::get('/ingresos-activos', [IngresoController::class, 'indexActivos'])->middleware(['auth', 'verified', 'premium'])->name('ingresoActivo');
Route::get('/ingresos-pasivos', [IngresoController::class, 'indexPasivos'])->middleware(['auth', 'verified', 'premium'])->name('ingresoPasivo');
Route::get('/notification', [NotificationController::class, 'getNotification']);
Route::get('/ahorros', [AhorroController::class, 'index'])->middleware(['auth', 'verified'])->name('ahorros');
Route::get('/deudas', [DeudasController::class, 'index'])->middleware(['auth', 'verified'])->name('deudas');
Route::get('/administrador', [NotificationController::class, 'admin'])->middleware(['auth', 'verified', 'admin'])->name('administrador');

Route::post('/ingresos-activos', [IngresoController::class, 'create'])->middleware(['auth', 'verified'])->name('ingresoA.create');
Route::post('/profile', [NotificationController::class, 'store'])->middleware(['auth', 'verified'])->name('notification.create');
Route::post('gastos-fijos', [GastosController::class, 'create'])->middleware(['auth', 'verified'])->name('gastosF.create');
Route::post('gastos-variables', [GastosController::class, 'createVariables'])->middleware(['auth', 'verified'])->name('gastosV.create');
Route::post('/dashboard/notification', [NotificationController::class, 'update'])->middleware(['auth', 'verified'])->name('notification.accept');
Route::post('dashboard/', [NotificationController::class, 'destroy'])->middleware(['auth', 'verified'])->name('notification.delete');
Route::post('/ahorros', [AhorroController::class, 'create'])->middleware(['auth', 'verified'])->name('ahorro.create');
Route::post('/deuda', [DeudasController::class, 'create'])->middleware(['auth', 'verified'])->name('deuda.create');

Route::patch('ingresos-activos/{ingreso}', [IngresoController::class, 'update'])->middleware(['auth', 'verified'])->name('ingresosA.update');
Route::patch('/dashboard/monto', [MontoController::class, 'update'])->middleware(['auth', 'verified'])->name('monto');
Route::patch('gastos-fijos/{gasto}', [GastosController::class, 'update'])->middleware(['auth', 'verified'])->name('gastosF.update');
Route::patch('ahorros/{ahorro}', [AhorroController::class, 'update'])->middleware(['auth', 'verified'])->name('ahorros.update');
Route::patch('administrador/{user}', [NotificationController::class, 'edit'])->middleware(['auth', 'verified', 'admin'])->name('user.update');

Route::delete('ingreso-activo/{ingreso}', [IngresoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ingreso.delete');
Route::delete('gastos-fijos/{gasto}', [GastosController::class, 'destroy'])->middleware(['auth', 'verified'])->name('gastosF.delete');
Route::delete('deudas/{deuda}', [DeudasController::class, 'destroy'])->middleware(['auth', 'verified'])->name('deuda.delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
