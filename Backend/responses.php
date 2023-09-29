<!-- PHP OPERACIONES -->
<?php 

if(isset($_POST['btn1'])){
    if(isset($_POST['cedulaAlumno']) && !empty($_POST['cedulaAlumno']) && isset($_POST['nombreAlumno']) && !empty($_POST['nombreAlumno']) && isset($_POST['notaMateAlumno']) && !empty($_POST['notaMateAlumno']) && isset($_POST['notaFisicaAlumno']) && !empty($_POST['notaFisicaAlumno']) && isset($_POST['notaProgAlumno']) && !empty($_POST['notaProgAlumno'])){


        // Valores Del Formulario
        $cedulaAlumno = $_POST['cedulaAlumno'];
        $nombreAlumno = $_POST['nombreAlumno'];
        $notaMateAlumno = $_POST['notaMateAlumno'];
        $notaFisicaAlumno = $_POST['notaFisicaAlumno'];
        $notaProgAlumno = $_POST['notaProgAlumno'];


        // CONTADORES

        //Promedios
        $contadorNotaMate = 0; // Contador nota Matematicas
        $contadorNotaFisica = 0; // Contador nota Fisica
        $contadorNotaProg = 0; // Contador Nota Programacion

        //Cantidad Aprobados
        $contadorAproMate=0;
        $contadorAproFisica=0;
        $contadorAproProg=0;

        //Cantidad Aplazados
        $contadorAplaMate=0;
        $contadorAplaFisica=0;
        $contadorAplaProg=0;

        //Aprobo Todas Las materias
        $contadorAproTodas=0;

        // Aprobo una materia
        $contadorAproUna=0;

        // Aprobo dos materias
        $contadorAproDos=0;

        // PROMEDIOS

        // Promedio de Matematicas
        $notasMate = [];
        for ($k=0; $k <count($nombreAlumno) ; $k++) { 
            $contadorNotaMate++;
            $notasMate[] = $notaMateAlumno[$k];
            $suma = array_sum($notasMate);
            $promedioNotasMate = $suma/$contadorNotaMate;
        }

        // Promedio de Fisica
        $notasFisica = [];
        for ($i=0; $i <count($nombreAlumno) ; $i++) { 
            $contadorNotaFisica++;
            $notasFisica[] = $notaFisicaAlumno[$i];
            $suma2 = array_sum($notasFisica);
            $promedioNotasFisica = $suma2/$contadorNotaFisica;
        }

        // Promedio Programacion

        $notasProg = [];
        for($j=0; $j <count($nombreAlumno); $j++){
            $contadorNotaProg++;
            $notasProg[] = $notaProgAlumno[$j];
            $suma3 = array_sum($notasProg);
            $promedioNotasProg = $suma3/$contadorNotaProg;
        }

    

        // APROBADOS EN CADA MATERIA

        // Matematicas
        for ($w=0; $w <count($nombreAlumno) ; $w++) { 
            if($notaMateAlumno[$w]>=10){
                $contadorAproMate++;
            }
        }

        // Fisica
        for ($y=0; $y <count($nombreAlumno) ; $y++) { 
            if($notaFisicaAlumno[$y]>=10){
                $contadorAproFisica++;
            }
        }

        // Programacion
        for ($z=0; $z <count($nombreAlumno) ; $z++) { 
            if($notaProgAlumno[$z]>=10){
                $contadorAproProg++;
            }
        }

        // APLAZADOS EN CADA MATERIA

        //Matameticas
        for ($o=0; $o <count($nombreAlumno) ; $o++) { 
            if($notaMateAlumno[$o]<10){
                $contadorAplaMate++;
            }
        }

        //Fisica
        for ($n=0; $n <count($nombreAlumno) ; $n++) { 
            if($notaFisicaAlumno[$n]<10){
                $contadorAplaFisica++;
            }
        }

        //Programacion
        for ($v=0; $v <count($nombreAlumno) ; $v++) { 
            if($notaProgAlumno[$v]<10){
                $contadorAplaProg++;
            }
        }

        // ALUMNOS QUE APROBARON TODAS LAS MATERIAS
        for ($z=0; $z <count($nombreAlumno) ; $z++) { 
            if($notaMateAlumno[$z]>=10 && $notaFisicaAlumno[$z]>=10 && $notaProgAlumno[$z]>=10){
                $contadorAproTodas++;
            }
        }

        // ALUMNOS QUE APROBARON UNA MATERIA
       for ($x=0; $x <count($nombreAlumno) ; $x++) { 
        if($notaMateAlumno[$x]>=10 && $notaFisicaAlumno[$x]<10 && $notaProgAlumno[$x]<10){
            $contadorAproUna++;
        }
        elseif($notaMateAlumno[$x]<10 && $notaFisicaAlumno[$x]>=10 && $notaProgAlumno[$x]<10){
            $contadorAproUna++;
        }
        elseif($notaMateAlumno[$x]<10 && $notaFisicaAlumno[$x]<10 && $notaProgAlumno[$x]>=10){
            $contadorAproUna++;
        }
        
    }

    // ALUMNOS QUE APROBARON DOS MATERIAS
    for ($l=0; $l <count($nombreAlumno) ; $l++) { 
        if($notaMateAlumno[$l]>=10 && $notaFisicaAlumno[$l]>=10 && $notaProgAlumno[$l]<10){
            $contadorAproDos++;
        }
        elseif($notaMateAlumno[$l]>=10 && $notaFisicaAlumno[$l]<10 && $notaProgAlumno[$l]>=10){
            $contadorAproDos++;
        }
        elseif($notaMateAlumno[$l]<10 && $notaFisicaAlumno[$l]>=10 && $notaProgAlumno[$l]>=10){
            $contadorAproDos++;
        }
    }

    // NOTAS MAXIMAS

    // Matematicas
    $NotaMaxMate= max($notaMateAlumno);

    // Fisica
    $NotaMaxFisica = max($notaFisicaAlumno);

    //Programacion
    $NotaMaxProg = max($notaProgAlumno);


        echo("<div style=' width: 100%;
        max-width: 1000px;
        margin: auto;'>
        <table style=' width: 100%;
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        table-layout: fixed;'>
            <caption style=' font-size: 20px;
            text-transform: uppercase;
            font-weight: bold;
            margin: 8px 0px;'>Nota Promedio de Cada Materia</caption>
            <thead>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <th style='text-transform: uppercase;
                    background-color: #ddd;'>Materia</th>
                    <th style='text-transform: uppercase;
                    background-color: #ddd;'>Promedio</th>
                </tr>
            </thead>
            <tbody>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Matematica</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$promedioNotasMate</td>
                   
                </tr>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Fisica</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$promedioNotasFisica</td>
                </tr>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Programacion</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$promedioNotasProg</td>
                </tr>
            </tbody>
        </table>
    </div>");

    echo("<br> <br>");

    echo("<div style=' width: 100%;
        max-width: 1000px;
        margin: auto;'>
        <table style=' width: 100%;
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        table-layout: fixed;'>
            <caption style=' font-size: 20px;
            text-transform: uppercase;
            font-weight: bold;
            margin: 8px 0px;'>Numero de Alumnos Aprobados en Cada Materia</caption>
            <thead>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <th style='text-transform: uppercase;
                    background-color: #ddd;'>Materia</th>
                    <th style='text-transform: uppercase;
                    background-color: #ddd;'>Cantidad de Alumnos Aprobados</th>
                </tr>
            </thead>
            <tbody>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Matematica</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$contadorAproMate</td>
                   
                </tr>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Fisica</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$contadorAproFisica</td>
                </tr>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Programacion</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$contadorAproProg</td>
                </tr>
            </tbody>
        </table>
    </div>");

    echo("<br> <br>");

    echo("<div style=' width: 100%;
    max-width: 1000px;
    margin: auto;'>
    <table style=' width: 100%;
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    table-layout: fixed;'>
        <caption style=' font-size: 20px;
        text-transform: uppercase;
        font-weight: bold;
        margin: 8px 0px;'>Numero de Alumnos Aplazados en Cada Materia</caption>
        <thead>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <th style='text-transform: uppercase;
                background-color: #ddd;'>Materia</th>
                <th style='text-transform: uppercase;
                background-color: #ddd;'>Cantidad de Alumnos Aplazados</th>
            </tr>
        </thead>
        <tbody>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <td style='  font-size: 16px;
                padding: 8px;
                text-align: center;'>Matematica</td>
                <td  style='  font-size: 16px;
                padding: 8px;
                text-align: center;' >$contadorAplaMate</td>
               
            </tr>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <td  style='  font-size: 16px;
                padding: 8px;
                text-align: center;'>Fisica</td>
                <td  style='  font-size: 16px;
                padding: 8px;
                text-align: center;' >$contadorAplaFisica</td>
            </tr>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <td  style='  font-size: 16px;
                padding: 8px;
                text-align: center;'>Programacion</td>
                <td  style='  font-size: 16px;
                padding: 8px;
                text-align: center;' >$contadorAplaProg</td>
            </tr>
        </tbody>
    </table>
</div>");

echo("<br> <br>");

echo("<div style=' width: 100%;
    max-width: 1000px;
    margin: auto;'>
    <table style=' width: 100%;
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    table-layout: fixed;'>
        <caption style=' font-size: 20px;
        text-transform: uppercase;
        font-weight: bold;
        margin: 8px 0px;'>Numero de Alumnos que aprobaron todas las Materias</caption>
        <thead>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <th style='text-transform: uppercase;
                background-color: #ddd;'>Cantidad</th>
        </thead>
        <tbody>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <td style='  font-size: 16px;
                padding: 8px;
                text-align: center;'>$contadorAproTodas</td>
            </tr>
        </tbody>
    </table>
</div>");

echo("<br> <br>");

echo("<div style=' width: 100%;
    max-width: 1000px;
    margin: auto;'>
    <table style=' width: 100%;
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    table-layout: fixed;'>
        <caption style=' font-size: 20px;
        text-transform: uppercase;
        font-weight: bold;
        margin: 8px 0px;'>Numero de Alumnos que aprobaron una sola materia</caption>
        <thead>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <th style='text-transform: uppercase;
                background-color: #ddd;'>Cantidad</th>
        </thead>
        <tbody>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <td style='  font-size: 16px;
                padding: 8px;
                text-align: center;'>$contadorAproUna</td>
            </tr>
        </tbody>
    </table>
</div>");

echo("<br> <br>");

echo("<div style=' width: 100%;
    max-width: 1000px;
    margin: auto;'>
    <table style=' width: 100%;
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    table-layout: fixed;'>
        <caption style=' font-size: 20px;
        text-transform: uppercase;
        font-weight: bold;
        margin: 8px 0px;'>Numero de Alumnos que aprobaron dos materias</caption>
        <thead>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <th style='text-transform: uppercase;
                background-color: #ddd;'>Cantidad</th>
        </thead>
        <tbody>
            <tr style='background-color: #f8f8f8;
            border: 1px solid #ddd;'>
                <td style='  font-size: 16px;
                padding: 8px;
                text-align: center;'>$contadorAproDos</td>
            </tr>
        </tbody>
    </table>
</div>");

echo("<br> <br>");

    echo("<div style=' width: 100%;
        max-width: 1000px;
        margin: auto;'>
        <table style=' width: 100%;
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        table-layout: fixed;'>
            <caption style=' font-size: 20px;
            text-transform: uppercase;
            font-weight: bold;
            margin: 8px 0px;'>Nota Maxima en cada Materia</caption>
            <thead>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <th style='text-transform: uppercase;
                    background-color: #ddd;'>Materia</th>
                    <th style='text-transform: uppercase;
                    background-color: #ddd;'>Nota Maxima</th>
                </tr>
            </thead>
            <tbody>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Matematica</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$NotaMaxMate</td>
                   
                </tr>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Fisica</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$NotaMaxFisica</td>
                </tr>
                <tr style='background-color: #f8f8f8;
                border: 1px solid #ddd;'>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;'>Programacion</td>
                    <td  style='  font-size: 16px;
                    padding: 8px;
                    text-align: center;' >$NotaMaxProg</td>
                </tr>
            </tbody>
        </table>
    </div>");

    }
}

?>