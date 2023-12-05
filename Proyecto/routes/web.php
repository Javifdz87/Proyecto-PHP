<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\adminController;



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
    return view('index')->name('index');
});

//Ruta para crear tareas
Route::get('/crearTareas', [ProvinciasController::class, 'controladorProvincias'])->name('crearTareas');


//Ruta para ver las tareas en una vista general
Route::get('/panelAdmin', [TareasController::class, 'controladorTareas'])->name('panelAdmin');


//Ruta de administrador de las tareas
Route::get('/infoTareas/{id}',   [adminController::class, 'controladorinfoTareas'])->name('infoTareas');

Route::post('/eliminarTarea/{id}',   [adminController::class, 'eliminarTarea'])->name('eliminarTareas');



//controlodar vista quieres eliminar tarea
Route::get('/eliminarTarea/{id}',  [adminController::class, 'vistaEliminar'])->name('vistaEliminar');



//devuelve pagina welcome
Route::get('/', function () {
    return view('welcome');
});


