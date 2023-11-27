<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvinciasController extends Controller
{
    public function mostrarProvincias()
    {
        return view('index');
        $provincias = modelProvincias::all();
        return view('provincias', ['usuarios' => $provincias]);
    }
}
?>