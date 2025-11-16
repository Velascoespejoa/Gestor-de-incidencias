<a href="./"><h1>Crear incidencias</h1></a><br>

<?php 

    require_once("clienteDAO.php");
    require_once("incidenciaDAO.php");
    $incidenciaDao = new incidenciaDAO;
    $clienteDao = new clienteDAO;

    if(isset($_POST["correo"]) && isset($_POST["tlf"])){
        $repetido = $incidenciaDao->compruebaIncidencia($_POST["nombre"],$_POST["correo"],$_POST["tlf"],$_POST["incidencia"],$_POST["estado"],$_POST["dispositivo"]);
        if($repetido == false){
            $incidenciaDao->crearIncidencia($_POST["nombre"],$_POST["correo"],$_POST["tlf"],$_POST["incidencia"],$_POST["estado"],$_POST["dispositivo"],$_POST["observaciones"],);
        }       
        header("Location: listadoIncidencia.php");
        exit;
    }
    else{
       
        $incidencias = $incidenciaDao->listarIncidenciasActivas();

        foreach ($incidencias as $incidencia) {
            $cliente = $clienteDao->buscarPorId($incidencia->getClienteId());
            echo $incidencia->getDispositivo() ." ".  $incidencia->getProblema() . " " . $incidencia->getEstado() . " " . $cliente->getNombre() . " " . $cliente->getCorreo() . "<br>";
        }
    }
?>

