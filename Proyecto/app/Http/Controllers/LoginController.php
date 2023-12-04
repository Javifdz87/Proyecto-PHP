<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelLogin;

class LoginController extends Controller
{
    public function controladorLogin()
    {
       $email= $_POST["email"];
       $password= $_POST["password"];

    }
}
?>