<!--Emiro Camacho/C.I:30.642.010-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad NOTA ALUMNOS</title>
    <link rel="stylesheet" href="css/styles2.css">
</head>
<body>
    
    <h1 style="text-align: center; margin-top:50px;color:white;">Bienvenido al Programa</h1> <br><br>
    <div class="container">
        <div class="login form">
            <!-- Formulario de Cantidad de Estudiantes -->
            <form action="../Backend/data.php" method="post">
                <label for="">Ingrese la Cantidad de alummnos a registrar: </label>
                <input type="number" name="cantidad_registro" required="true" min=1>
                <input class="button" type="submit" name="btn" value="Registrar">
            </form>
        </div>
    </div>
    




</body>
</html>