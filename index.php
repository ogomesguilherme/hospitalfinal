<?php 

namespace index;

require_once("vendor/autoload.php");

use app\conn;
use app\db;

$mysqli = conn::connect();

$resultado = db::execute("SELECT * FROM PACIENTES", $mysqli);


if ($resultado->num_rows > 0) {
    while ($paciente = $resultado->fetch_assoc()){
        echo $paciente['Name'];
    }
}