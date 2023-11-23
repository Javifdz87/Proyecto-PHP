<?php
namespace App\Http\Controllers;

use App\Models\Conexion;

class AddController{
    public static function get(){
       $conexion=  Conexion::getInstance()->getConnection();
        return view('tareas');
    }
}
?>