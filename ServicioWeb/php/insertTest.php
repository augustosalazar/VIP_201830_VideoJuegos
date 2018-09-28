<?php

$link=@mysqli_connect("servicioweb_db_1","root","password","down");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$query = "SELECT * FROM Jugador";
$idJugador = "'id1'";
$nombre = "'Augusto'";
$nivel = 1;
$edad = 8;
$insert = "insert INTO Jugador(idJugador,nombreJugador,nivelJujador,edadJugador) VALUES (". $idJugador . "," . $nombre . "," . $nivel . "," . $edad .");";

echo $insert."\n";

$result = mysqli_query($link,$insert);
//echo $result;

$result = mysqli_query($link,$query);
while ($row = mysqli_fetch_assoc($result))
{
    echo $row['id'], PHP_EOL;
}
mysqli_close($link);

?>
