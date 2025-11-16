<a href="crearIncidencia.php"><h1>Crear incidencias</h1></a><br>

<?php 

    require_once("clienteDAO.php");
    require_once("incidenciaDAO.php");


    if(isset($_POST["correo"]) && isset($_POST["tlf"])){
        
        $incidenciaDao = new incidenciaDAO;
        $incidenciaDao->crearIncidencia($_POST["nombre"],$_POST["correo"],$_POST["tlf"],$_POST["incidencia"],$_POST["estado"],$_POST["dispositivo"],$_POST["observaciones"],);
        header("Location: listadoIncidencia.php");
        exit;
    }
    else{
        $incidenciaDao = new incidenciaDAO;
        $incidencias = $incidenciaDao->listarIncidenciasActivas();

        foreach ($incidencias as $incidencia) {
           echo $incidencia->getProblema() . "<br>";
        }
    }    





?>

