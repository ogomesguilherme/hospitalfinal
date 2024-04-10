<?php

namespace novoPaciente;

require_once("vendor/autoload.php");

use app\novoPacienteClass;

if (count($_POST) > 0) {
    $novoPaciente = new novoPacienteClass($_POST);
    echo var_dump($novoPaciente->handleErrors);
}

include("includes/head.php");

?>

<form action="" method="post">
    <input type="text" name="Name" placeholder="Nome">
    <input type="text" name="MomName" placeholder="Mãe">
    <input type="date" name="Birthday">
    <input type="submit" value="Registrar">
</form>



<?php include("includes/foot.php") ?>

