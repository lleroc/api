<?php
require_once("../config/cors.php");
require_once("../models/pacientes.model.php");
error_reporting(0);

    $Pacientes = new Pacientes;
    switch ($_GET["op"]) {
            /*TODO: Procedimiento para listar todos los registros */
        case 'todos':
            $datos = array();
            $datos = $Pacientes->todos();
            while ($row = mysqli_fetch_assoc($datos)) {
                $todos[] = $row;
            }
            echo json_encode($todos);
            break;
            /*TODO: Procedimiento para sacar un registro */
        case 'uno':
            $idPacientes = $_POST["idPacientes"];
            $datos = array();
            $datos = $Pacientes->uno($idPacientes);
            $res = mysqli_fetch_assoc($datos);
            echo json_encode($res);
            break;


            /*TODO: Procedimiento para insertar */
        case 'insertar':
            $Nombres = $_POST["Nombres"];
            $Apellidos = $_POST["Apellidos"];
            $Cedula = $_POST["Cedula"];
            $Estado_Civil_idEstado_Civil = $_POST["estado"];
            $TipoSangre_idTipoSangre = $_POST["tipo"];
            $Usuarios_idUsuarios =1 ;
            
            $FechaNacimiento = $_POST["FechaNacimiento"];
            $datos = array();
            $datos = $Pacientes->Insertar($Nombres, $Apellidos, $Cedula, $Estado_Civil_idEstado_Civil, $TipoSangre_idTipoSangre, $Usuarios_idUsuarios, $FechaNacimiento);
            echo json_encode($datos);
            break;

            /*TODO: Procedimiento para actualizar */
        case 'actualizar':
            $idPacientes = $_POST["idPacientes"];
            $Nombres = $_POST["Nombres"];
            $Apellidos = $_POST["Apellidos"];
            $Cedula = $_POST["Cedula"];
            $Estado_Civil_idEstado_Civil = $_POST["estado"];
            $TipoSangre_idTipoSangre = $_POST["tipo"];
            $Usuarios_idUsuarios = 1;
            $FechaNacimiento = $_POST["FechaNacimiento"];
            $datos = array();
            $datos = $Pacientes->Actualizar($idPacientes, $Nombres, $Apellidos, $Cedula, $Estado_Civil_idEstado_Civil, $TipoSangre_idTipoSangre, $Usuarios_idUsuarios, $FechaNacimiento);
            echo json_encode($datos);
            break;
            /*TODO: Procedimiento para eliminar */
        case 'eliminar':
            $idPacientes = $_POST["idPacientes"];
            $datos = array();
            $datos = $Pacientes->Eliminar($idPacientes);
            echo json_encode($datos);
            break;
    }

