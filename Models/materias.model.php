<?php
require_once('cls_conexion.model.php');
class Clase_Materias
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `malla_curricular`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($Id_Materias)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `malla_curricular` WHERE Id_Materias=$Id_Materias";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($Semestre, $Primera_Materia, $Segunda_Materia, $Tercera_Materia, $Cuarta_Materia, $Quinta_Materia, $Sexta_Materia, $Septima_Materia)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `malla_curricular`(`Semestre`, `Primera_Materia`, `Segunda_Materia`, `Tercera_Materia`, `Cuarta_Materia`, `Quinta_Materia`, `Sexta_Materia`, `Septima_Materia`) VALUES ('$Semestre','$Primera_Materia','$Segunda_Materia','$Tercera_Materia','$Cuarta_Materia','$Quinta_Materia','$Sexta_Materia','$Septima_Materia')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($Id_Materias, $Semestre, $Primera_Materia, $Segunda_Materia, $Tercera_Materia, $Cuarta_Materia, $Quinta_Materia, $Sexta_Materia, $Septima_Materia)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `malla_curricular` SET `Semestre`='$Semestre',`Primera_Materia`='$Primera_Materia',`Segunda_Materia`='$Segunda_Materia',`Tercera_Materia`='$Tercera_Materia',`Cuarta_Materia`='$Cuarta_Materia',`Quinta_Materia`='$Quinta_Materia',`Sexta_Materia`='$Sexta_Materia',`Septima_Materia`='$Septima_Materia' WHERE `Id_Materias`= $Id_Materias";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($Id_Materias)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "delete from malla_curricular where Id_Materias=$Id_Materias";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
