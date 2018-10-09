<?php

$link = mysqli_connect("servicioweb2_db_1","root","password","down");
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

$query_verify = "SELECT * FROM Jugador where idJugador= ".$idJugador;

echo $insert."\n";

$result = mysqli_query($link,$query_verify);


$result = mysqli_query($link,$query);
while ($row = mysqli_fetch_assoc($result))
{
    echo $row['id'], PHP_EOL;
}
mysqli_close($link);

?>
