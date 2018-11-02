<?php
    include('configuration.php');
?>
<html>
    <head>
        <title>Base De Datos</title>
    </head>
    <link rel="stylesheet" type="text/css" href="estilotabla.css">
    <body>
    <h2 align="center"><FONT COLOR="blue"> SESIÓN MINIJUEGO </FONT></h2>
    <div style="text-align:center;">
    <table border=1 cellspacing=0 cellpadding=8 style="margin: 0 auto;">  
    <tr bgcolor="red">
    <th>ID</th>  
    <th>Nombre del Minijuego</th>
    <th>Fecha</th>
    <th>Hora</th> 
    <th>Nombre de la sesion del juego</th>
    </tr>
    <?php
        $connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
        if (!$connection) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
        }       
        $query = "SELECT * FROM SesionMiniJuego WHERE idSesionJuego=". $_GET['var'];
        $result = mysqli_query($connection,$query);
        // Añadir registros a la tabla que se creó anteriormente, desde la base de datos  
        while ($row = mysqli_fetch_row($result)){   
            echo "<tr> <tr onclick=location='versesionactividad.php?var=$row[0]'>"; 
            echo "<td align=center>".$row[0]."</td>";
            echo "<td align=center>".$row[1]."</td>";  
            $date = date('Y-m-d',$row[2]);  
            echo "<td align=center>".$date."</td>";
            $hour = date('H:i:s',$row[2]);  
            echo "<td align=center>".$hour."</td>";
            echo "<td align=center>".$row[3]."</td>"; 
            echo "</tr>"; 
        }  
        echo "</table>";
        mysqli_close($connection);
        ?>
</table>
</div>
</body>
</html>