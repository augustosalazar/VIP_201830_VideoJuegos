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
	$User=$value['ID'];
	$level=$value['Nivel'];
	$sessions = $value['GameSessions'];
	foreach($sessions as $keyx=>$valuex){
		$timestamp=$valuex['TimeStamp'];
		$mini = $valuex['MiniGameSessions'];
		foreach($mini as $keyz=>$valuez){
			$timestampminisession=$valuez['TimeStamp'];
			$idminijuego=$valuez['ID'];
			$activitySessions = $valuez['ActivitySessions'];
			foreach($activitySessions as $keyw=>$valuew){
				$timestampstart=$valuew['TimeStampStart'];
				$idActividad =$valuew['ID'];
				$timestampend=$valuew['TimeStampEnd'];
				$levelofaccomplishmentsession=$valuew['LevelOfAccomplishment'];
				$timefirstevent=$valuew['TimeToFirstEvent'];
				$ActionEvents = $valuew['ActionEvents'];
				echo "Num de ActionEvents ".sizeof($ActionEvents)."\n";
				foreach($ActionEvents as $keye=>$valuee){
					$type = $valuee['type'];
					$timeofevent = $valuee['TimeStamp'];
					$coordinatestart = $valuee['CoordinatesStart'];
					$coordinatesend= $valuee['CoordinatesEnd'];
					$ObjectInteractedID= $valuee['ObjectInteractedID'];
				}
			}
		}
	}
}

$insert = "INSERT INTO Jugador (idJugador,nivelJujador) VALUES ('$User','$level')";
$resultado=mysqli_query($connection,$insert);
if(!$resultado){
	echo "error 1";
}
$insert = "INSERT INTO SesionJuego (idJugador,timeStamp) VALUES ('$User','$timestamp')";
$resultado=mysqli_query($connection,$insert);
if(!$resultado){
	echo "error 2";
}
$insert = "INSERT INTO SesionMiniJuego (idSesionMinijuego,timestamp) VALUES ('$idminijuego','$timestampminisession')";
$resultado=mysqli_query($connection,$insert);
if(!$resultado){
	echo "error 3";
}
$insert = "INSERT INTO SesionActividad (TimeStampInicio,timeStampFin, timepoPrimeraActiviadSignificativa,nivelExito,SesionActividadcol, idSesionMinijuego) VALUES ('$timestampstart','$timestampend','$timefirstevent','$levelofaccomplishmentsession','$idActividad','$idminijuego')";
$resultado=mysqli_query($connection,$insert);
if(!$resultado){
	echo "error 4";
}
$insert = "INSERT INTO Evento (tipo,timeStamp,coordenadaInicio,coordenadaFin, idElemento) VALUES ('$type','$timeofevent','$coordinatestart','$coordinatesend','$ObjectInteractedID')";
$resultado=mysqli_query($connection,$insert);
if(!$resultado){
	echo "error 5";
}
?>
