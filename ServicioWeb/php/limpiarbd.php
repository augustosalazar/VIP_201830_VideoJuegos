<?php 
	include('configuration.php');
	$connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
	        if (!$connection) {
	            echo "Error: Unable to connect to MySQL." . PHP_EOL;
	            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
	}
	$querys = array();
	$querys[0]= "DELETE FROM Evento";
	$querys[1]= "DELETE FROM Evento2";
	$querys[2]= "DELETE FROM hijos";
	$querys[3]= "DELETE FROM jugador";
	$querys[4]= "DELETE FROM sesion";
	$querys[5]= "DELETE FROM SesionJuego";
	$querys[6]= "DELETE FROM Jugador";
	$querys[7]= "DELETE FROM sesionMiniJuego";
	$querys[8]= "DELETE FROM sesionactividad";
	$querys[9]= "DELETE FROM sesionminijuego";
	$querys[10]= "DELETE FROM sesionjuego";
	for ($i=0; $i < count($querys); $i++) { 
		mysqli_query($connection,$querys[$i]);
	}
	echo "<h1> Registros Borrados Exitosamente! </h1>";
	mysqli_close($connection);
?>
