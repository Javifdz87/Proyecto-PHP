<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;

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

Route::get('/tareas', [FormularioController::class, 'mostrarFormulario'])->name('tareas');
Route::post('/validar', [FormularioController::class, 'validarFormulario'])->name('validar');


Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/tareas', function () {
    return view('tareas');
});*/

Route::get('/index', function () {
    return view('index');
});
