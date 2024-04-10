<?php

namespace novoPaciente;

require_once("vendor/autoload.php");

use app\novoPacienteClass;

$novoPaciente = new novoPacienteClass("Thayná","Silvia","15/11/1995");
$novoPaciente->register();

?>