<?php

$uploaded_file = 'uploads/1537832384-r.txt';

$string = file_get_contents($uploaded_file);
$json_a = json_decode($string, true);

$players = $json_a['Players'];

foreach($players as $key=>$value){

        print("User Id ".$value['ID']."\n");
	print("Nivel ".$value['Nivel']."\n");

	$sessions = $value['GameSessions'];
	echo "Num de sesiones ".sizeof($sessions)."\n";
	foreach($sessions as $keyx=>$valuex){
		print("Timestamp de session ".$valuex['TimeStamp']."\n");
		$mini = $valuex['MiniGameSessions'];
		echo "Num de mini sesiones ".sizeof($mini)."\n";
		foreach($mini as $keyz=>$valuez){
			print("TimeStamp de mini session ".$valuez['TimeStamp']."\n");
			print("LevelOfAccomplishment de mini session ".$valuez['LevelOfAccomplishment']."\n");
			$activitySessions = $valuez['ActivitySessions'];
			echo "Num de ActivitySessions ".sizeof($activitySessions)."\n";
			foreach($activitySessions as $keyw=>$valuew){
				print("TimeStampStart de la session ".$valuew['TimeStampStart']."\n");
				print("LevelOfAccomplishment de la session ".$valuew['LevelOfAccomplishment']."\n");
				$ActionEvents = $valuew['ActionEvents'];
				echo "Num de ActionEvents ".sizeof($ActionEvents)."\n";
				foreach($ActionEvents as $keye=>$valuee){
					$type = $valuee['type'];
					print("\t"."Type of event ".$valuee['type']."\n");
				}
			}
		}
	}
}


?>
