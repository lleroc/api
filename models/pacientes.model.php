<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Pacientes
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT distinct Pacientes.idPacientes, COALESCE(Pacientes.Cedula,'') as Cedula, Pacientes.Nombres as Nombres, Pacientes.Apellidos as Apellidos, COALESCE(Estado_Civil.Detalle,'') as estado, COALESCE(TipoSangre.Detalle,'') as tipo FROM Pacientes LEFT JOIN Estado_Civil ON Pacientes.Estado_Civil_idEstado_Civil = Estado_Civil.idEstado_Civil LEFT JOIN TipoSangre ON Pacientes.TipoSangre_idTipoSangre = TipoSangre.idTipoSangre ORDER BY Pacientes.Apellidos;";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
 
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($idPacientes)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT  * FROM Pacientes WHERE idPacientes = $idPacientes";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }

    /*TODO: Procedimiento para insertar */
    public function Insertar($Nombres, $Apellidos, $Cedula, $Estado_Civil_idEstado_Civil, $TipoSangre_idTipoSangre, $Usuarios_idUsuarios, $FechaNacimiento)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT into Pacientes(Nombres,Apellidos,Cedula,Estado_Civil_idEstado_Civil,TipoSangre_idTipoSangre,Usuarios_idUsuarios,FechaNacimiento) values ( '$Nombres', '$Apellidos', '$Cedula', $Estado_Civil_idEstado_Civil,  $TipoSangre_idTipoSangre,  $Usuarios_idUsuarios,  $FechaNacimiento)";
    echo $cadena;
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'Error al insertar en la base de datos';
        }
    }
  
    /*TODO: Procedimiento para actualizar */
    public function Actualizar($idPacientes, $Nombres, $Apellidos, $Cedula, $Estado_Civil_idEstado_Civil, $TipoSangre_idTipoSangre, $Usuarios_idUsuarios, $FechaNacimiento)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "update Pacientes set Nombres='$Nombres',Apellidos='$Apellidos',Cedula='$Cedula',Estado_Civil_idEstado_Civil=$Estado_Civil_idEstado_Civil,TipoSangre_idTipoSangre=$TipoSangre_idTipoSangre,Usuarios_idUsuarios=$Usuarios_idUsuarios,FechaNacimiento='$FechaNacimiento' where idPacientes= $idPacientes";
        
        if (mysqli_query($con, $cadena)) {
            return "ok";
        } else {
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idPacientes)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "delete from Pacientes where idPacientes = $idPacientes";
        if (mysqli_query($con, $cadena)) {
            return true;
        } else {
            return false;
        }
    }
}
