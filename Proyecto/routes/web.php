<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\TareasController;


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

// web.php

Route::get('/tareas', [ProvinciasController::class, 'controladorProvincias'])->name('provincias');

//Route::post('/validar', [FormularioController::class, 'validarFormulario'])->name('validar');

//devuelve pagina welcome
Route::get('/', function () {
    return view('welcome');
});

//vista de la  base de datos tareas


Route::get('/index', [TareasController::class, 'controladorTareas'])->name('tareas');


//Route::get('/index', [indexController::class, 'mostrarIndex'])->name('index');


