<?php
    include('configuration.php');
?>
<html>
    <head>
        <title>Base De Datos</title>
    </head>
    <link rel="stylesheet" type="text/css" href="estilotabla.css">
    <body>
        <h2 align="center"><FONT COLOR="blue"> ACTIVIDADES </FONT></h2>
        <div style="text-align:center;">
        <table border=1 cellspacing=0 cellpadding=8 style="margin: 0 auto;">  
        <tr>
        <th>ID</th> 
        <th>Fecha de inicio</th>
        <th>Hora de inicio</th>
        <th>Fecha de fin</th>
        <th>Hora de fin</th> 
        <th>Fecha de primera actividad significativa</th>
        <th>Hora de actividad significativa</th>        
        <th>Id Sesion de actividad</th>
        <th>Nivel de exito</th>
        <th>Id de Minijuego</th>
        </tr>
        <?php
            $connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
            if (!$connection) {
                echo "Error: Unable to connect to MySQL." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
            }       
            $query = "SELECT * FROM SesionActividad WHERE idSesionMiniJuego=". $_GET['var'];
            $result = mysqli_query($connection,$query);
            // Añadir registros a la tabla que se creó anteriormente, desde la base de datos  
            while ($row = mysqli_fetch_row($result)){   
                echo "<tr onclick=location='vereventos.php?var=$row[0]'>";  
                echo "<td align=center>".$row[0]."</td>";  
                $date = date('Y-m-d',$row[1]);  
                echo "<td align=center>".$date."</td>";
                $hour = date('H:i:s',$row[1]);  
                echo "<td align=center>".$hour."</td>";
                $date = date('Y-m-d',$row[2]);  
                echo "<td align=center>".$date."</td>";
                $hour = date('H:i:s',$row[2]);  
                echo "<td align=center>".$hour."</td>";
                $date = date('Y-m-d',$row[3]);  
                echo "<td align=center>".$date."</td>";
                $hour = date('H:i:s',$row[3]);  
                echo "<td align=center>".$hour."</td>";
                echo "<td align=center>".$row[4]."</td>";
                echo "<td align=center>".$row[5]."</td>";
                echo "<td align=center>".$row[7]."</td>";;    
                echo "</tr>";
            }  
            echo "</table>";
            mysqli_close($connection);
            ?>
        </table>
        </div>
    </body>
</html>