<?php
  include('configuration.php');
	include('file2bd2.php');
?>

<?php
	writeToDb('uploads/formatDic182018/1545246079-r.json',$db_host,$db_username,$db_password,$db_schema);
?>
