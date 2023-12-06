<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelOperarios;

class OperariosController extends Controller
{
    public function controladorOperarios()
    {
       $modelOperarios = new modelOperarios();

       $operarios=$modelOperarios->mostrarOperarios();
       return view('mostrarOperarios')->with('operarios', $operarios);

    }
}
?>
