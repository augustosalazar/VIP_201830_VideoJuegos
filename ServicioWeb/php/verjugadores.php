<?php
    include('configuration.php');
?>
<html>
    <head>
        <title>Base De Datos</title>
    </head>
    <link rel="stylesheet" type="text/css" href="estilotabla.css"> 
    <body>
    <h2 align="center"><FONT COLOR="blue"> JUGADORES </FONT></h2>
    <div style="text-align:center;">
    <table border=1 cellspacing=0 cellpadding=8 style="margin: 0 auto;">  
    <tr>
    <th>ID</th>
    <!--th>Id del jugador</th-->  
    <th>Nombre</th>
    <th>Nivel</th>
    <th>Edad</th>
    </tr>
    <?php
        $connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
        if (!$connection) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
        }       
        $query = "SELECT * FROM Jugador";
        $result = mysqli_query($connection,$query);
        // Añadir registros a la tabla que se creó anteriormente, desde la base de datos  
        while ($row = mysqli_fetch_row($result)){
            echo "<tr onclick=location='versesiones.php?var=$row[0]'>";  
            echo "<td align=center>".$row[0]."</td>";  
            echo "<td align=center>".$row[2]."</td>";
            echo "<td align=center>".$row[3]."</td>";
            echo "<td align=center>".$row[4]."</td>";   
            echo "</tr>";  
        }  
        echo "</table>";
        mysqli_close($connection);
        ?>
</table>
</div>
</body>
</html>