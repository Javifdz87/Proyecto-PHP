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

//Ruta login
//Route::get('/index', [ProvinciasController::class, 'controladorProvincias'])->name('login');
Route::get('/index', function () {
    return view('index');
});

//Ruta para crear tareas
Route::get('/crearTareas', [ProvinciasController::class, 'controladorProvincias'])->name('crearTareas');

//Route::post('/validar', [FormularioController::class, 'validarFormulario'])->name('validar');

//devuelve pagina welcome
Route::get('/', function () {
    return view('welcome');
});

//vista de la  base de datos tareas


Route::get('/generalTareas', [TareasController::class, 'controladorTareas'])->name('generalTareas');


//Route::get('/index', [indexController::class, 'mostrarIndex'])->name('index');


