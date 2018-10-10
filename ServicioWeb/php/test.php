<?php
  include('configuration.php');
	include('file2bd.php');
?>

<?php
	writeToDb('uploads/1538669773-r.txt',$db_host,$db_username,$db_password,$db_schema);
?>
