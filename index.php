<?php 

    require_once("clienteDAO.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="ingresarIncidencia.php">Ingresar Nueva Incidencia</a>

    <?php 

    $clienteDao = new clienteDAO();
    $clienteDao->crearCliente("Antonio","velascoespejoa@gmail.com",954147598);

    ?>
</body>
</html>
