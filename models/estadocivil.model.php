<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class EstadoCivil
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Estado_Civil` ";
        $datos = mysqli_query($con, $cadena);
        return $datos;
    }
 
  
}
