<?php 

    require_once("database.php");
    require_once("incidencia.php");
    require_once("clienteDAO.php");

    class incidenciaDAO{

        private PDO $conexion;

        public function __construct(){
            $this->conexion = Database::conectarBaseDatos();
        }

        public function listarIncidenciasActivas(){

            $sql = "SELECT * FROM incidencias WHERE estado != 'finalizado' LIMIT 20";
            $consulta = $this->conexion->query($sql);
            $resultado = $consulta->fetchAll();
            $incidencias = [];
            foreach ($resultado as $incidencia) {
                $incidencias[] = new incidencia(
                    $incidencia["id"],
                    $incidencia["dispositivo"],
                    $incidencia["problema"],
                    $incidencia["estado"]
                );
            }
            return $incidencias;

        }

        public function listarTodasIncidencias(){
            
            $sql = "SELECT * FROM incidencias";
            $setencia = $this->conexion->query($sql);
            $resultado = $setencia->fetchAll();
            $incidencias = [];
            foreach ($resultado as $incidencia) {
                $incidencias[] = new incidencia(
                    $incidencia["id"],
                    $incidencia["dispositivo"],
                    $incidencia["problema"],
                    $incidencia["estado"]
                );
            }
            return $incidencias;
        }
        /**
         * funcion sin terminar
         */
        public function crearIncidencia($nombre,$correo,$tlf,$incidencia,$estado,$tipoDispositivo,$obversaciones=null){

            $clienteDao = new clienteDAO();
            $cliente = $clienteDao->buscarPorCorreo($correo);
            if($cliente == null){
                $clienteDao->crearCliente($nombre,$correo,$tlf);
                $cliente = $clienteDao->buscarPorCorreo($correo);
            }

            $sql = "INSERT INTO incidencias ( cliente_id , dispositivo , problema , estado , observaciones) 
            VALUES (:cliente_id , :dispositivo , :problema , :estado , :observaciones)";
            $id = $cliente->getId();
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(":cliente_id",$id,PDO::PARAM_INT);
            $consulta->bindParam(":dispositivo",$tipoDispositivo,PDO::PARAM_STR);
            $consulta->bindParam(":problema",$incidencia,PDO::PARAM_STR);
            $consulta->bindParam(":estado",$estado,PDO::PARAM_STR);
            $consulta->bindParam(":observaciones",$obversaciones,PDO::PARAM_STR);
            $consulta->execute();

            


        }
    }

?>