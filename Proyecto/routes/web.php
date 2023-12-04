<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\infoTareasController;


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
Route::get('/generalTareas', [TareasController::class, 'controladorTareas'])->name('generalTareas');


//Ruta para ver la informacion completa de las tareas
Route::get('/infoTareas/{id}',   [infoTareasController::class, 'controladorinfoTareas'])->name('infoTareas');



//devuelve pagina welcome
Route::get('/', function () {
    return view('welcome');
});
