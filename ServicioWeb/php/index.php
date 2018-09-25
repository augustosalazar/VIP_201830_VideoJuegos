<?php

$link=@mysqli_connect("servicioweb_db_1","root","password","test_db");
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$query = "SELECT * FROM infojuego";

$result = mysqli_query($link,$query);

while ($row = mysqli_fetch_assoc($result))
{
    echo $row['accion'], PHP_EOL;
}
mysqli_close($link);

?>
