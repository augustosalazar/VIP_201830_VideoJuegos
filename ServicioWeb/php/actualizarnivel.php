<?php
	include('configuration.php');
	$uploaded_file = 'uploads/'.date("U").'-r.txt';
	file_put_contents($uploaded_file, $_POST['data']);

	//$uploaded_file = 'uploads/actualizacion.txt'; 
	$string = file_get_contents($uploaded_file);
	$value = json_decode($string, true);

	$connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
	if (!$connection) {
	    	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    	exit;
	    }
	$user=$value['Id'];
	echo $user;
	$query_verify = "SELECT id FROM Jugador WHERE idJugador='".$user."'";
	$result = mysqli_query($connection,$query_verify);
	$row = mysqli_fetch_assoc($result);
	$row_cnt = $result->num_rows;
	if ($row_cnt != 0){
		$nivel = $value['Level'];
		$query_update = "UPDATE Jugador SET nivelJujador='".$nivel."'WHERE idJugador='".$user."'";
		echo "  ".$query_update;
		mysqli_query($connection,$query_update);
	}
	mysqli_close($connection);		
?>