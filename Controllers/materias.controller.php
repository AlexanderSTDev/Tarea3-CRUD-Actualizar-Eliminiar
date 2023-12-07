<?php
require_once('../Models/materias.model.php');
$materias = new Clase_Materias;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array();
        $datos = $materias->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case "uno":
        $Id_Materias = $_POST["Id_Materias"];
        $datos = array();
        $datos = $materias->uno($Id_Materias);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
    case 'insertar':
        $Semestre = $_POST["Semestre"];
        $Primera_Materia = $_POST["Primera_Materia"];
        $Segunda_Materia = $_POST["Segunda_Materia"];
        $Tercera_Materia = $_POST["Tercera_Materia"];
        $Cuarta_Materia = $_POST["Cuarta_Materia"];
        $Quinta_Materia = $_POST["Quinta_Materia"];
        $Sexta_Materia = $_POST["Sexta_Materia"];
        $Septima_Materia = $_POST["Septima_Materia"];

        $datos = array();
        $datos = $materias->insertar($Semestre, $Primera_Materia, $Segunda_Materia, $Tercera_Materia, $Cuarta_Materia, $Quinta_Materia, $Sexta_Materia, $Septima_Materia);
        echo json_encode($datos);
        break;
    case 'actualizar':
        $Id_Materias = $_POST["Id_Materias"];
        $Semestre = $_POST["Semestre"];
        $Primera_Materia = $_POST["Primera_Materia"];
        $Segunda_Materia = $_POST["Segunda_Materia"];
        $Tercera_Materia = $_POST["Tercera_Materia"];
        $Cuarta_Materia = $_POST["Cuarta_Materia"];
        $Quinta_Materia = $_POST["Quinta_Materia"];
        $Sexta_Materia = $_POST["Sexta_Materia"];
        $Septima_Materia = $_POST["Septima_Materia"];

        $datos = array();
        $datos = $materias->actualizar($Id_Materias, $Semestre, $Primera_Materia, $Segunda_Materia, $Tercera_Materia, $Cuarta_Materia, $Quinta_Materia, $Sexta_Materia, $Septima_Materia);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $Id_Materias = $_POST["Id_Materias"];
        $datos = array();
        $datos = $materias->eliminar($Id_Materias);
        echo json_encode($datos);
        break;
}
