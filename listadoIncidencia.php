<a href="./"><h1>Crear incidencias</h1></a><br>

<?php 

    /**requires de los DAO que vamos a utilizar */
    require_once("clienteDAO.php");
    require_once("incidenciaDAO.php");
    $incidenciaDao = new incidenciaDAO;
    $clienteDao = new clienteDAO;

    // con este if-else evitamos que se repita la creacion de una incidencia igual  
    if(isset($_POST["correo"]) && isset($_POST["tlf"])){
        $repetido = $incidenciaDao->compruebaIncidencia($_POST["nombre"],$_POST["correo"],$_POST["tlf"],$_POST["incidencia"],$_POST["estado"],$_POST["dispositivo"]);
        if($repetido == false){
            $incidenciaDao->crearIncidencia($_POST["nombre"],$_POST["correo"],$_POST["tlf"],$_POST["incidencia"],$_POST["estado"],$_POST["dispositivo"],$_POST["observaciones"],);
        }       
        header("Location: listadoIncidencia.php");
        exit;
    }
    else{
       
        $incidencias = $incidenciaDao->listarIncidenciasActivas();?>

        <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="stylesheet" href="estilos/listadoIncidencia.css">
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
            <form action="editarIncidencia.php" method="post">

                <table>
                    <tr>
                        <th>Incidencia</th>
                        <th>Estado</th>
                        <th>Tipo de dispositivo</th>
                        <th>observaciones</th>
                        <th>nombre</th>
                        <th>correo</th>
                        <th>telefono</th>
                        <th class="ultimo"></th>
                    </tr>
                    <?php                     
                   
                    foreach ($incidencias as $incidencia):
                        $cliente = $clienteDao->buscarPorId($incidencia->getClienteID())                      
                    ?>                    
                        <tr>
                            <td><?=  $incidencia->getProblema(); ?></td>
                            <td><?=  $incidencia->getEstado(); ?></td>
                            <td><?=  $incidencia->getDispositivo(); ?></td>
                            <td><?=  $incidencia->getObservaciones(); ?></td>
                            <td><?=  $cliente->getNombre(); ?></td>
                            <td><?=  $cliente->getCorreo(); ?></td>
                            <td><?=  $cliente->getTelefono(); ?></td>
                            <td class="ultimo"><button type="submit" name="submit" value ="<?= $incidencia->getId(); ?>">editar</button></td>
                        </tr>
                                              
                    
                    <?php endforeach;
                    
                    ?>                  
                </table>
                </form>
            </body>
            </html>
    
    <?php
    }
?>



