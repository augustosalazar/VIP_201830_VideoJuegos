<?php
	include('configuration.php');
?>
<?php
$connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);

if (!$connection) {
    	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
	}else{
		$idJugador = "id1";
		$nombre = "Augusto";
		$nivel = 1;
		$edad = 8;
		$insert = "INSERT INTO Jugador (idJugador,nombreJugador,nivelJujador,edadJugador) VALUES ('$idJugador','$nombre ','$nivel','$edad')";
		$resultado=mysqli_query($connection,$insert);
		if(!$resultado){
			echo "error";
		}
	}
$query = "SELECT * FROM Jugador";

$query_verify = "SELECT * FROM Jugador where idJugador=".$idJugador;

//echo $insert."\n";

$result = mysqli_query($connection,$query_verify);


$result = mysqli_query($connection,$query);
while ($row = mysqli_fetch_assoc($result))
{
    echo $row['id'], PHP_EOL;
}
mysqli_close($connection);

?>
