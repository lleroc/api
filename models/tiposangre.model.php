<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class TipoSangre
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `TipoSangre` ";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
 
  
}
