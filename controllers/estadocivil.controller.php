<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/estadocivil.model.php");
error_reporting(0);

$estadocivil = new EstadoCivil;
switch ($_GET["op"]) {
        /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $estadocivil->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
}
