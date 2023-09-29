<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad NOTA DE ALUMNOS</title>
    <link rel="stylesheet" href="../Frontend/css/styles.css">
</head>
<body>
    <!-- Formulario  -->
    <?php
    //Emiro Camacho/C.I:30.642.010
    if(isset($_POST['btn'])){
        if(isset($_POST['cantidad_registro']) && !empty($_POST['cantidad_registro'])){
            $cantidad_registro = $_POST['cantidad_registro'];
            //echo($cantidad_registro);
            $contador = 0;
            for($i = 0; $i < $cantidad_registro; $i++){ ?>
            <?php $contador++; ?>
            <div class="container">
                <div class="login form">
                <h3 style="text-align:center;">Estudiante <?php echo($contador);?></h3>
            <form action="../Backend/responses.php" method="post">
                <!-- Datos a ser enviados -->
                <label for="">Ingrese la cedula del Alumno</label>
                <input name="cedulaAlumno[]" type="number" placeholder="Cedula" required="true" > 
                <label for="">Ingrese el Nombre del Alumno</label> 
                <input name="nombreAlumno[]" type="text" placeholder="Nombre" required="true" pattern="[a-z A-Z]+" oninvalid="this.setCustomValidity('Solo puedes ingresar letras')"
                oninput="this.setCustomValidity('')" >   
                <label for="">Ingrese La nota de Matematicas</label> 
                <input name="notaMateAlumno[]" type="number" placeholder="Matematicas" required="true" min="1" max="20">  
                <label for="">Ingrese La nota de Fisica</label> 
                <input name="notaFisicaAlumno[]" type="number" placeholder="Fisica" required="true" min="1" max="20">  
                <label for="">Ingrese La nota de Programacion</label> 
                <input name="notaProgAlumno[]" type="number" placeholder="Programacion" required="true" min="1" max="20">  
            

        <?php
     
        
    }
        
    }
    
    } ?>


    <?php
    if(isset($_POST['btn'])){?>
        
         <input type="submit" class="button" name="btn1" value="Enviar Datos">   
        
        <?php
     
    
    } ?>
    

        
        </form>
                </div>
            </div>
           
</body>
</html>