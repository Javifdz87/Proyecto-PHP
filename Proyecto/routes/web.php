<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TareasController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ControladorOperarios;



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
Route::post('/index', [LoginController::class, 'controladorLogin'])->name('login');


//Ruta para ver todos las tareas desde las cuentas operario
Route::get('/vistaOperario', [ControladorOperarios::class, 'vistaTareasGeneral'])->name('vistaOperario');

//Ruta panel de Operarios que solo salgan sus tareas que puede manejar
Route::get('/panelOperario', [ControladorOperarios::class, 'mostrarTareasOperario'])->name('panelOperario');

//ver informacion desde panel operario
Route::get('/infoTareas/{id}',   [ControladorOperarios::class, 'controladorinfoTareas'])->name('infoTareas');



//Ruta para crear tareas
Route::get('/crearTareas', [TareasController::class, 'mostrarFormulario'])->name('crearTareas');


//Ruta para ver las tareas en una vista general
Route::get('/panelAdmin', [adminController::class, 'mostrarTareasAdmin'])->name('panelAdmin');


//Ruta de administrador de las tareas
Route::get('/infoTareas/{id}',   [adminController::class, 'controladorinfoTareas'])->name('infoTareas');

Route::post('/eliminarTarea/{id}',   [adminController::class, 'eliminarTarea'])->name('eliminarTareas');



//controlodar vista quieres eliminar tarea
Route::get('/eliminarTarea/{id}',  [adminController::class, 'vistaEliminar'])->name('vistaEliminar');



//devuelve pagina welcome
Route::get('/', function () {
    return view('welcome');
});


