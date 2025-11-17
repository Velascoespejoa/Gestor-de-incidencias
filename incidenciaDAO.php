<?php 

    require_once("database.php");
    require_once("incidencia.php");
    require_once("clienteDAO.php");

    class incidenciaDAO{

        private PDO $conexion;

        public function __construct(){
            $this->conexion = Database::conectarBaseDatos();
        }
        /**
         * funcion que comprueba que exista una incidencia igual antes de crearla
         */
        public function compruebaIncidencia(string $nombre , string $correo , int $tlf , string $incidencia , string $estado , string $dispositivo) : bool{
            
            $sql = "SELECT i.id 
                    FROM incidencias i
                    JOIN clientes c ON i.cliente_id = c.id
                    WHERE c.nombre = :nombre
                    AND c.correo = :correo
                    AND c.telefono = :tlf
                    AND i.problema = :incidencia
                    AND i.estado = :estado
                    AND i.dispositivo = :dispositivo";

            $consulta = $this->conexion->prepare($sql);
            
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
            $consulta->bindParam(":tlf",$tlf,PDO::PARAM_INT);
            $consulta->bindParam(":incidencia",$incidencia,PDO::PARAM_STR);
            $consulta->bindParam(":estado",$estado,PDO::PARAM_STR);
            $consulta->bindParam(":dispositivo",$dispositivo,PDO::PARAM_STR);  
            $consulta->execute();
            
            $existe = $consulta->fetch(PDO::FETCH_ASSOC);

            if ($existe) {
                // Sí existe
                return true;
            } else {
                // No existe
                return false;
            }
        }

        public function listarIncidenciasActivas(): array{

            $sql = "SELECT * FROM incidencias WHERE estado != 'finalizado' LIMIT 20";
            $consulta = $this->conexion->query($sql);
            $resultado = $consulta->fetchAll();
            $incidencias = [];
            foreach ($resultado as $incidencia) {
                $incidencias[] = new incidencia(
                    $incidencia["id"],
                    $incidencia["cliente_id"],
                    $incidencia["dispositivo"],
                    $incidencia["problema"],
                    $incidencia["estado"],
                    $incidencia["observaciones"]
                );
            }
            return $incidencias;
        }

        public function listarTodasIncidencias():array{
            
            $sql = "SELECT * FROM incidencias";
            $setencia = $this->conexion->query($sql);
            $resultado = $setencia->fetchAll();
            $incidencias = [];
            foreach ($resultado as $incidencia) {
                $incidencias[] = new incidencia(
                    $incidencia["id"],
                    $incidencia["cliente_id"],
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
        public function crearIncidencia(string $nombre, string $correo,int $tlf, string $incidencia, string $estado,string $tipoDispositivo,string $obversaciones=""){

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