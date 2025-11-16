<?php 

    require_once("database.php");
    require_once("cliente.php");

    class clienteDAO{
        private PDO $conexion;

        public function __construct(){
            $this->conexion = Database::conectarBaseDatos();
        }

        public function listarClientes(){

            $sql = "SELECT * FROM clientes";
            $consulta = $this->conexion->query($sql);
            $resultado = $consulta->fetchAll();
            $clientes = [];
            foreach ($resultado as $cliente) {
                $clientes[] = new Cliente($cliente["id"],$cliente["nombre"],$cliente["correo"],$cliente["telefono"]);
                
            }
            return $clientes;

        }

        public function buscarPorCorreo(string $correo){
            $sql = "SELECT * from clientes WHERE correo = ?";
            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam("s",$correo);
            $consulta->execute();
            $resultado = $consulta->fetchAll();

            return new Cliente($resultado["id"],$resultado["nombre"],$resultado["correo"],$resultado["telefono"]);
        }

        public function crearCliente(string $nombre,string $correo,int $tlf){
            
            $sql = "INSERT INTO clientes (nombre, correo, telefono)
            VALUES (:nombre, :correo, :telefono)";

            $consulta = $this->conexion->prepare($sql);
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
            $consulta->bindParam(":telefono",$tlf,PDO::PARAM_INT);
            $consulta->execute();
        }
    }

    

?>