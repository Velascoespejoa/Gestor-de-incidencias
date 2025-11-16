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
            height: 22px;

        }

        body{
            font-family: Verdana;
            background-color: lightyellow;
        }
        fieldset{
            border-radius: 15px;
            background-color: lightcyan;
            width: 22%;
            text-align: center;
            margin-left: 38%;
        }
        h1{
            text-align: center;
            margin-top: 6%;
        }
    </style>
</head>
<body>
    <div id="contenedor">

        <h1>Nueva incidencia</h1>
        <form action="nuevaIncidencia.php" method="post">
            <fieldset>
                <legend>Cliente</legend>

                <label for="nombre" >Nombre</label>
                <input type="text" name="nombre" required><br><br>

                <label for="correo" >Correo</label>
                <input type="email" name="correo" required><br><br>

                <label for="tlf" >Teléfono</label>
                <input type="text" name="tlf" required>
            </fieldset>
            <fieldset>
                <legend>Incidencia</legend>

                <label for="problema">Problema</label>
                <input type="text" name="problema" required><br><br>

                <label for="estado">Estado</label>
                <select name="estado" id="">
                    <option value="pendiente" selected>Pendiente de revisión</option>
                    <option value="progreso">En Progreso</option>
                    <option value="terminado">Finalizado</option>
                </select><br><br>

                <label for="dispositivo">Tipo de dispositivo</label>
                <select name="dispositivo" id="">
                    <option value="smarthphone">Smarthphone</option>
                    <option value="laptop">Laptop</option>
                    <option value="sobremesa">Sobremesa</option>
                    <option value="tablet">Tablet</option>
                </select><br><br>

                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id=""></textarea><br>
                <input type="submit">
            </fieldset>        
    </form>

    </div>
    
</body>
</html>