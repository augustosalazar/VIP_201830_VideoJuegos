<?php
	include('configuration.php');
?>
<?php
    if(isset($_POST['name']) && isset($_POST['data'])){
        $uploaded_file = 'uploads/'.date("U").'-r.txt';
        file_put_contents($uploaded_file, $_POST['data']);
        echo "uploaded.";

        //$connection = mysql_connect($db_host,$db_username,$db_password);
        //mysql_select_db($db_schema);

    }else{
        echo "invalid file uploaded.";
    }
?>
