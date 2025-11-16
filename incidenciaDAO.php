<?php 

    require_once("database.php");
    require_once("incidencia.php");

    class incidenciaDAO{

        private PDO $conexion;

        public function __construct(){
            $this->conexion = Database::conectarBaseDatos();
        }

        public function listarIncidencias(){
            
            $sql = "SELECT * FROM incidencias";
            $setencia = $this->conexion->query($sql);
            $resultado = $setencia->fetchAll();
            $incidencias = [];
            foreach ($resultado as $incidencia) {
                $incidencias[] = new incidencia(
                    $incidencia["id"],
                    $incidencia["dispositivo"],
                    $incidencia["problema"],
                    $incidencia["fecha_ingreso"],
                    $incidencia["estado"]
                );
            }
            return $incidencias;
        }

        public function crearIncidencia($incidencia){

            $sql = "INSERT INTO incidencias";
        }
    }

?>