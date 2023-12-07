<?php
class Clase_Conectar_Base_Datos
{
    public $conexion;
    protected $db;
    private $host = "localhost";  //192.168.100.103
    private $user = "root";
    private $pass = "";
    private $dbname = "sexto";

    public function ProcedimientoConectar()
    {
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        mysqli_query($this->conexion, "SET NAMES 'utf8'");

        if (!$this->conexion) {
            die("Error en la conexion con el servidor" . mysqli_error($this->conexion));
        }

        $this->db = mysqli_select_db($this->conexion, $this->dbname);

        if (!$this->db) die("Error en la seleccion de la base de datos" . mysqli_error($this->conexion));
        return $this->conexion;
    }
}
