<?php
  include('configuration.php');
  include('file2bd2.php');
?>

<?php
    if(isset($_POST['name']) && isset($_POST['data'])){
        $uploaded_file = 'uploads/'.date("U").'-r.json';
        file_put_contents($uploaded_file, $_POST['data']);
        echo "uploaded.";
		writeToDb($uploaded_file,$db_host,$db_username,$db_password,$db_schema);
    }else{
        echo "invalid file uploaded.";
    }
?>
