<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        fieldset{
            display: inline;
            margin: 15%;
        }
        textarea{
            width: 200px;
            height: 200px;
            text-align: center;
        }
        td , th {
            margin: 10px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php 

    require_once("incidenciaDAO.php");
    require_once("clienteDAO.php");

    if(!isset($_POST["submit"])){
        echo "oh, no!";
    }
    else{
       
        $incidenciaDao = new incidenciaDAO();
        $incidencia = $incidenciaDao->devuelveIncidenciaPorId($_POST["submit"]);
        $clienteDao = new clienteDAO();
        $cliente = $clienteDao->buscarPorId($incidencia->getClienteId());
        ?>        
    
        <fieldset>
            <legend>Incidencia nº<?= $incidencia->getId() ?></legend>
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
                <tr>
                    <td><textarea name="incidencia" id=""><?= $incidencia->getProblema();  ?></textarea></td>
                    <td>
                        <select name="estado" id="">
                            <option value="pendiente">Pendiente</option>
                            <option value="progreso">En progreso</option>
                            <option value="finalizado">Finalizado</option>
                        </select>
                    </td>
                    <td>
                        <select name="dispositivo" id="">
                            <option value="smartPhone">Smartphone</option>
                            <option value="tablet">Tablet</option>
                            <option value="sobremesa">Sobremesa</option>
                            <option value="laptop">Lapton</option>
                            <option value="smartWatch">SmartWatch</option>
                            <option value="otro">Otro</option>
                        </select>
                    </td>
                    <td><textarea name="observaciones" id=""><?= $incidencia->getObservaciones() ?></textarea></td>
                    <td><input type="text" name="nombre" value="<?= $cliente->getNombre() ?>"></td>
                    <td><input type="text" name="correo" value="<?= $cliente->getCorreo() ?>"></td>
                    <td><input type="text" name="tlf" value="<?= $cliente->getTelefono() ?>"></td>

                </tr>
            </table>
        </fieldset>


        <?php 
    }
     ?>

</body>
</html>
