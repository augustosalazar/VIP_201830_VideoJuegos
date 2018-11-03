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
	$querys[1]= "DELETE FROM SesionJuego";
	$querys[2]= "DELETE FROM Jugador";
	$querys[3]= "DELETE FROM SesionMiniJuego";
	$querys[4]= "DELETE FROM SesionActividad";
	for ($i=0; $i < count($querys); $i++) { 
		mysqli_query($connection,$querys[$i]);
	}
	echo "<h1> Registros Borrados Exitosamente! </h1>";
	mysqli_close($connection);
?>