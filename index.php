<?php

namespace index;

require_once("vendor/autoload.php");

use app\conn;

$mysqli = conn::connect();

$resultado = $mysqli->query("SELECT * FROM PACIENTES") or die($connector->error);

include("includes/head.php");

?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Mãe</th>
            <th scope="col">Nascimento</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if ($resultado->num_rows > 0) {
            while ($paciente = $resultado->fetch_assoc()) {
        ?>

                <tr>
                    <th scope="row"><?php echo $paciente['ID'] ?></th>
                    <td><?php echo $paciente['Name'] ?></td>
                    <td><?php echo $paciente['MomName'] ?></td>
                    <td><?php echo $paciente['Birthday'] ?></td>
                </tr>

        <?php }
        } ?>

    </tbody>
</table>

<?php include("includes/foot.php") ?>