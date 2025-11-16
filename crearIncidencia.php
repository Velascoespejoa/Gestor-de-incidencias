<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <style>

        legend{
            border: 1px solid black;
            background-color: white;
            border-radius: 3px;
            height: 26px;

        }

        body{
            font-family: Verdana;
            background-color: lightyellow;
            font-size: 1.3em;
        }
        fieldset{
            border-radius: 15px;
            background-color: lightcyan;
            width: 22%;
            text-align: center;
            margin-left: 36.6%;
            padding: 2%;
        }
        h1{
            text-align: center;
            margin-top: 4%;
        }

        #observaciones{
            width: 80%;
            height: 110px;
            margin-top: 10px;
        }
        #enviar{
            margin-top: 10px;
            background-color: green;
            color: white;
            width: 200px;
            height: 30px;
            border-radius: 5px;
        }


    </style>
</head>
<body>
    <div id="contenedor">

        <h1>Nueva incidencia</h1>
        <form action="listadoIncidencia.php" method="post" autocomplete="off">
            <fieldset>
                <legend>Cliente</legend>

                <label for="nombre" >Nombre</label>
                <input type="text" name="nombre" value= "" required><br><br>

                <label for="correo" >Correo</label>
                <input type="email" name="correo" required><br><br>

                <label for="tlf" >Teléfono</label>
                <input type="text" name="tlf" required>
            </fieldset><br>
            <fieldset>
                <legend>Incidencia</legend>

                <label for="incidencia">Incidencia</label>
                <input type="text" name="incidencia" required><br><br>

                <label for="estado">Estado</label>
                <select name="estado" id="">
                    <option value="pendiente" selected>Pendiente de revisión</option>
                    <option value="progreso">En progreso</option>
                    <option value="esperandoRespuesta">Esperando respuesta del cliente</option>
                    <option value="terminado">Finalizado</option>
                </select><br><br>

                <label for="dispositivo">Tipo de dispositivo</label>
                <select name="dispositivo" id="">
                    <option value="smartphone">Smartphone</option>
                    <option value="laptop">Laptop</option>
                    <option value="sobremesa">Sobremesa</option>
                    <option value="tablet">Tablet</option>
                    <option value="smartwatch">Smartwatch</option>
                    <option value="otro">Otro</option>
                </select><br><br>


                <label for="observaciones">Observaciones</label><br>
                <textarea name="observaciones" id="observaciones"></textarea><br>
                <input type="submit" id="enviar">
            </fieldset>
            <a href="listadoIncidencia.php">Lista de incidencias</a>        
    </form>

    </div>
    
</body>
</html>