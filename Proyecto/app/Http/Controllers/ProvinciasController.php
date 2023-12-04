<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelProvincias;

class ProvinciasController extends Controller
{
    public function controladorProvincias()
    {
       $modelProvincias = new modelProvincias();

       $provincias=$modelProvincias->mostrarProvincias();
       return view('crearTareas')->with('provincias', $provincias);

    }
}
?>
