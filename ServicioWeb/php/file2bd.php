<?php

$uploaded_file = 'uploads/1537832384-r.txt';

$string = file_get_contents($uploaded_file);
$json_a = json_decode($string, true);
//echo $json_a;
//foreach ($json_a as $key => $value){
//  echo  $key . ':' . $value;
//}

//$json_a as $key => $val
//echo "$key => $val\n";

$players = $json_a['Players'];

foreach($players as $key=>$value){

        print("User Id ".$value['ID']."\n");
	print("Nivel ".$value['Nivel']."\n");

	$sessions = $value['GameSessions'];
	echo "Num de sesiones ".sizeof($sessions)."\n";
	//echo "Las sesiones ".$sessions."\n";
	foreach($sessions as $keyx=>$valuex){
		print("Timestamp de session ".$valuex['TimeStamp']."\n");
		$mini = $valuex['MiniGameSessions'];
		echo "Num de mini sesiones ".sizeof($mini)."\n";
		foreach($mini as $keyz=>$valuez){
			print("TimeStampStart de mini session ".$valuez['TimeStampStart']."\n");
			print("LevelOfAccomplishment de mini session ".$valuez['LevelOfAccomplishment']."\n");
			//$actionEvents = $valuez['ActionEvents'];
			//echo "Num de events ".sizeof($actionEvents)."\n";
			//foreach($actionEvents as $keyw=>$valuew){Ã
				//print("Type of event ".$valuew['type']."\n");
			//	echo "hello\n";
			//}Ã
		}
	}
}

//$data =  $json_a['Players'];
//echo $data[0]['ID'] . "\n";

//foreach($json_a->data as $mydata)
//{
//    echo $mydata->name . "\n";
//    foreach($mydata->values as $values)
//    {
//        echo $values->value . "\n";
//    }
//}

//echo "---------------------\n";


//foreach($data as $key=>$value){

        //print_r($value);

//}
echo "\n";
//echo $json_a['Version de Documento'];
//echo "\n";
//echo $json_a['Version del Juego'];
//echo "\n";
//echo $json_a['Version de Parametros'];
//echo "\n";

//echo "--------------\n";

//$jsonIterator = new RecursiveIteratorIterator(
//    new RecursiveArrayIterator(json_decode($string, TRUE)),
//    RecursiveIteratorIterator::SELF_FIRST);
//
//foreach ($jsonIterator as $key => $val) {
//    if(is_array($val)) {
//        echo "$key:\n";
//    } else {
//        echo "$key => $val\n";
//    }
//}

?>
