<?php
	include('configuration.php');
?>

<?php
function writeToDb($uploaded_file,$db_host,$db_username,$db_password,$db_schema) {
//$uploaded_file = 'uploads/1538669773-r.txt';

$string = file_get_contents($uploaded_file);
$json_a = json_decode($string, true);
$players = $json_a['Players'];
$versionDoc = $json_a['Version de Documento'];
$versionJuego = $json_a['Version del Juego'];
$versionParam  = $json_a['Version de Parametros'];

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
	$nombre=$value['Nombre'];
	$edad =$value['Edad'];
	$sessions = $value['GameSessions'];
	$query_verify = "SELECT id FROM Jugador WHERE idJugador='".$user."'";
	//printf("Query %s\n", $query_verify);
   $result = mysqli_query($connection,$query_verify);
		$row_cnt = $result->num_rows;
		//printf("Result set has %d rows.\n", $row_cnt);
		if ($row_cnt == 0){
			$insert = "INSERT INTO Jugador (idJugador,nivelJujador,nombreJugador,edadJugador) VALUES ('$user','$level','$nombre','$edad')";


			$result=mysqli_query($connection,$insert);
			if(!$result){
				echo "error 1";
				break;
			}
			$query_verify = "SELECT id FROM Jugador WHERE idJugador='".$user."'";
			$result = mysqli_query($connection,$query_verify);
			$row = mysqli_fetch_assoc($result);
			$idOfUser = $row['id'];
			//printf("Result of new user with id = %d \n", $idOfUser);
		} else {
			$row = mysqli_fetch_assoc($result);
			$idOfUser = $row['id'];
			//printf("Result has user with id = %d \n", $idOfUser);
		}


	foreach($sessions as $keyx=>$valuex){
		$timestamp=$valuex['TimeStamp'];  //*** */
		$mini = $valuex['MiniGameSessions'];



	
		foreach($mini as $keyz=>$valuez){
			$idminijuego=$valuez['ID'];  //*** */
			$activitySessions = $valuez['ActivitySessions'];

			foreach($activitySessions as $keyw=>$valuew){
				$timestampstart=$valuew['TimeStampStart']; //*** */
				$idActividad =$valuew['ID']; //*** */
				$timestampend=$valuew['TimeStampEnd']; //*** */
				$levelofaccomplishmentsession=$valuew['LevelOfAccomplishment']; //*** */
				$timefirstevent=$valuew['TimeToFirstEvent']; //*** */
				$Resumen = $valuew['Resumen']; //*** */
				$ActionEvents = $valuew['ActionEvents']; //*** */


				$insert = "INSERT INTO Sesion (versionDoc,versionJuego,versionParam,timeStamp,idJugador,idMinijuego,idActividad,timeStampInicio,timeStampFin,tiempoPrimeraActividadSignificativa,resumen,nivelExito) VALUES ('$versionDoc','$versionJuego',$versionParam','$idOfUser','$timestamp','$idOfUser','$idminijuego','$idActividad','$timestampstart','$timestampend','$timefirstevent','$Resumen','$levelofaccomplishmentsession')";
				$resultado=mysqli_query($connection,$insert);
				if(!$resultado){
					printf("query error.\n", $insert);
					echo "error 2";
					break;
				}


				$query_verify = "SELECT * FROM Sesion where TimeStampInicio=".$timestampstart;
				$result = mysqli_query($connection,$query_verify);
				$row = mysqli_fetch_assoc($result);
				$idminijuego = $row['id'];

				//echo "Num de ActionEvents ".sizeof($ActionEvents)."\n";
				foreach($ActionEvents as $keye=>$valuee){
					$type = $valuee['type'];
					$timeofevent = $valuee['TimeStamp'];
					$coordinatestartX = $valuee['CoordinatesStartX'];
					$coordinatestartY = $valuee['CoordinatesStartY'];
					$coordinatesendX= $valuee['CoordinatesEndX'];
					$coordinatesendY= $valuee['CoordinatesEndY'];
					$ObjectInteractedID= $valuee['ObjectInteractedID'];

					$query_verify = "SELECT * FROM SesionActividad where id=".$idminijuego;
					$result = mysqli_query($connection,$query_verify);
					$row_cnt = $result->num_rows;
					//printf("query  %s\n", $query_verify);
					//printf("Result select SesionActividad set has %d rows.\n", $row_cnt);
					$row = mysqli_fetch_assoc($result);
					$idSesion = $row['id'];

					$insert = "INSERT INTO Evento2 (tipo,timeStamp,coordenadaInicioX,coordenadaInicioY,coordenadaFinX,coordenadaFinY, idElemento,idSesion)
					VALUES ('$type','$timeofevent','$coordinatestart','$coordinatesend','$ObjectInteractedID','$idSesion')";
					$resultado=mysqli_query($connection,$insert);
					if(!$resultado){
						printf("query error %s\n", $insert);
						echo "error 5";
						break;
					}
				}
			}
		} //foreach($mini as $keyz=>$valuez){
	} //foreach($sessions as $keyx=>$valuex){

}
}// end of function
?>
