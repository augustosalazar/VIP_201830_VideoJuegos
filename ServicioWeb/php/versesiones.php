<?php
    include('configuration.php');
?>
<html>
    <head>
        <title>Base De Datos</title>
    </head>
    <link rel="stylesheet" type="text/css" href="estilotabla.css">
    <body>
    <h2 align="center"><FONT COLOR="blue"> SESIÓNES DE JUEGO </FONT></h2>
    <div style="text-align:center;">
    <table border=1 cellspacing=0 cellpadding=8 style="margin: 0 auto;">  
    <tr>
    <th>ID</th>
    <th>Fecha</th>
    <th>Hora</th>    
    <th>Nombre de Jugador</th>
    </tr>
    <?php
        $connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
        if (!$connection) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
        }       
        $query = "SELECT * FROM SesionJuego WHERE idJugador=". $_GET['var'];
        $result = mysqli_query($connection,$query);
        // Añadir registros a la tabla de Sesion De Juego, desde la base de datos  
        while ($row = mysqli_fetch_row($result)){   
            echo "<tr> <tr onclick=location='versesionminijuego.php?var=$row[0]'>";  
            echo "<td align=center>".$row[0]."</td>";
            $date = date('Y-m-d',$row[2]);  
            echo "<td align=center>".$date."</td>";
            $hour = date('H:i:s',$row[2]);  
            echo "<td align=center>".$hour."</td>";
            echo "<td align=center>".$_GET['var2']."</td>";  
            echo "</tr>";  
        }  
        echo "</table>";
        mysqli_close($connection);
        ?>
</table>
</div>
</body>
</html>