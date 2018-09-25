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

//foreach($json_a as $key=>$value){
//
//        print($value);
//
//}

$data =  $json_a['Players'];
echo $data[0]['ID'];
foreach($data as $key=>$value){

        //print_r($value);

}
echo "\n";
//echo $json_a['Version de Documento'];
//echo "\n";
//echo $json_a['Version del Juego'];
//echo "\n";
//echo $json_a['Version de Parametros'];
//echo "\n";

echo "--------------\n";

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($string, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
}

?>
