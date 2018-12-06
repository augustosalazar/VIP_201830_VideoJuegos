<?php
    include('configuration.php');
?>
<html>
    <head>
        <title>Base De Datos</title>
    </head>
    <link rel="stylesheet" type="text/css" href="estilotabla.css"> 
    <body>
        <h2 align="center"><FONT COLOR="blue"> Información general </FONT></h2>
        <div style="text-align:center;">
            <table border=1 cellspacing=0 cellpadding=8 style="margin: 0 auto;">  
            <tr>  
            <th>Jugador</th>
            <th>Edad</th>
            <th>Fecha</th>
            <th>Hora inicio</th>
            <th>Nombre Minijuego</th>
            <th>Tiempo de duración</th>
            <th>Tiempo antes de la primera act sig</th>
            <th>Nombre Actividad</th>
            <th>Nivel de exito</th>
            </tr>
            <?php
                function r($sec){
                    $i=0;
                    while($sec>=60){
                        $i++;
                        $sec=$sec-60;
                    }
                    return $i . ":" . $sec . " mins";
                }
                $connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
                if (!$connection) {
                    echo "Error: Unable to connect to MySQL." . PHP_EOL;
                    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                exit;
                }       
                $query2 = "SELECT * FROM SesionJuego WHERE idJugador=". $_GET['var'];
                $result2 = mysqli_query($connection,$query2);
                // Añadir registros a la tabla de Sesion De Juego, desde la base de datos  
                while ($row1 = mysqli_fetch_row($result2)){
                    $query = "SELECT * FROM Jugador WHERE id=". $_GET['var'];
                    $result = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_row($result)){
                        echo "<tr>";    
                        echo "<td align=center>".$row[2]."</td>";
                        echo "<td align=center>".$row[4]."</td>";
                        }   
                        $date = date('Y-m-d',$row1[2]);  
                        echo "<td align=center>".$date."</td>";
                        $hour = date('H:i:s',$row1[2]);  
                        echo "<td align=center>".$hour."</td>";
                        $query4 = "SELECT * FROM SesionMiniJuego WHERE idSesionJuego=". $row1[0];
                        $result4 = mysqli_query($connection,$query4); 
                        while ($row4 = mysqli_fetch_row($result4)){   
                            echo "<td align=center>".$row4[1]."</td>";
                            $query3 = "SELECT * FROM SesionActividad WHERE idSesionMiniJuego=". $row4[0];    
                            $result3 = mysqli_query($connection,$query3); 
                                while ($row3 = mysqli_fetch_row($result3)){   
                                echo "<td>".r($row3[2] - $row3[1])."</td>";
                                echo "<td>".r($row3[3] - $row3[1])."</td>";
                                echo "<td align=center>".$row3[4]."</td>";
                                echo "<td align=center>".$row3[5]."</td>";
                                //echo "<td align=center> <a href='VIP/randompoints.php?var=$row3[0]&var2=$row3[1]&var3=$row3[4]' aling ='center'> Ver Eventos </a></td>";
                                echo "<td align=center> <a href='visualizacion/vereventos.php?var=$row3[0]&var2=$row3[4]' aling ='center'> Ver Eventos </a></td>";     
                            }
                        }
                }   
                echo "</tr>";  
                echo "</table>";
                mysqli_close($connection);
                ?>
        </table>
    </div>
</body>
</html>