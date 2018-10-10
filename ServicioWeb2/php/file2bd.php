<?php
	include('configuration.php');
?>

<?php

$uploaded_file = 'uploads/1537832064-r.txt';

$string = file_get_contents($uploaded_file);
$json_a = json_decode($string, true);
$players = $json_a['Players'];

$connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
if (!$connection) {
    	echo "Error: Unable to connect to MySQL." . PHP_EOL;
    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	exit;
}
//$query1 = "SELECT * FROM Jugador";

foreach($players as $key=>$value){
	$user=$value['ID'];
	$level=$value['Nivel'];
	$sessions = $value['GameSessions'];
	$insert = "INSERT INTO Jugador (idJugador,nivelJujador) VALUES ('$user','$level')";
	$resultado=mysqli_query($connection,$insert);
	if(!$resultado){
		echo "error 1";
	}
	foreach($sessions as $keyx=>$valuex){
		$timestamp=$valuex['TimeStamp'];
		$mini = $valuex['MiniGameSessions'];

		$query_verify = "SELECT * FROM Jugador WHERE idJugador=".$user;
		$result = mysqli_query($connection,$query_verify);
		$row = mysqli_fetch_assoc($result);
		$aux = $row['id'];

		$insert = "INSERT INTO SesionJuego (idJugador,timeStamp) VALUES ('$aux','$timestamp')";
		$resultado=mysqli_query($connection,$insert);
		if(!$resultado){
			echo "error 2";
		}
		foreach($mini as $keyz=>$valuez){
			$timestampminisession=$valuez['TimeStamp'];
			$idminijuego=$valuez['ID'];
			$activitySessions = $valuez['ActivitySessions'];

			$query_verify = "SELECT * FROM SesionJuego where timeStamp=".$timestamp;
			$result = mysqli_query($connection,$query_verify);
			$row = mysqli_fetch_assoc($result);
			$aux = $row['id'];

			$insert = "INSERT INTO SesionMiniJuego (idSesionMinijuego,timestamp,idSesionJuego) VALUES ('$idminijuego','$timestampminisession','$aux')";
			$resultado=mysqli_query($connection,$insert);
			if(!$resultado){
				echo "error 3";
			}
			foreach($activitySessions as $keyw=>$valuew){
				$timestampstart=$valuew['TimeStampStart'];
				$idActividad =$valuew['ID'];
				$timestampend=$valuew['TimeStampEnd'];
				$levelofaccomplishmentsession=$valuew['LevelOfAccomplishment'];
				$timefirstevent=$valuew['TimeToFirstEvent'];
				$ActionEvents = $valuew['ActionEvents'];

				$query_verify = "SELECT * FROM SesionMiniJuego where idSesionMinijuego=".$idminijuego;
				$result = mysqli_query($connection,$query_verify);
				$row = mysqli_fetch_assoc($result);
				$aux = $row['id'];


				$insert = "INSERT INTO SesionActividad (TimeStampInicio,timeStampFin, timepoPrimeraActiviadSignificativa,nivelExito,SesionActividadcol, idSesionMinijuego) VALUES ('$timestampstart','$timestampend','$timefirstevent','$levelofaccomplishmentsession','$idActividad','$aux')";
				$resultado=mysqli_query($connection,$insert);
				if(!$resultado){
					echo "error 4";
				}
				echo "Num de ActionEvents ".sizeof($ActionEvents)."\n";
				foreach($ActionEvents as $keye=>$valuee){
					$type = $valuee['type'];
					$timeofevent = $valuee['TimeStamp'];
					$coordinatestart = $valuee['CoordinatesStart'];
					$coordinatesend= $valuee['CoordinatesEnd'];
					$ObjectInteractedID= $valuee['ObjectInteractedID'];

					/*$query_verify = "SELECT * FROM SesionActividad where idSesionMinijuego=".$idminijuego;
					$result = mysqli_query($connection,$query_verify);
					$result = mysqli_query($connection,$query);
					$row = mysqli_fetch_assoc($result);*/

					$insert = "INSERT INTO Evento (tipo,timeStamp,coordenadaInicio,coordenadaFin, idElemento) VALUES ('$type','$timeofevent','$coordinatestart','$coordinatesend','$ObjectInteractedID')";
					$resultado=mysqli_query($connection,$insert);
					if(!$resultado){
						echo "error 5";
					}
				}
			}
		}
	}
}
?>
