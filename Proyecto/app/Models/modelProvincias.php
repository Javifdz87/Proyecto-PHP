<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\modeloBD;
use Illuminate\Queue\Connectors\DatabaseConnector;

class modelProvincias extends Model
{
    protected $table = 'provincias';
    protected $connection;

    public function __construct()
    {
        $this->connection = modeloBD::getInstance()->getConnection();
    }

    public function mostrarProvincias()
    {
        $provincias = $this->connection->query("SELECT nombre as provincia from tbl_provincias;")->fetchall;
        return $provincias;
     }
}
?>