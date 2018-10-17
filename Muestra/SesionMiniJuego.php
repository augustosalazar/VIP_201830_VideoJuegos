<?php
 //$conexion=mysqli_connect('localhost','root','','test');
 $conexion=mysqli_connect('servicioweb_db_1','root','password','down');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sesión de minijuego</title>
<style>
body {
	height: 30vh;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-flow: wrap;
	font-size: 20px;
	font-family: 'Titillium Web', sans-serif;
	background-image: url("http://d2yspv744gxsd1.cloudfront.net/wp-content/uploads/2018/03/21155023/dia-mundial-sindrome-down.jpg");
}
#bton{
	text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 15px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
}
table {
   background-color:white;
   width: 50%;
   font-family:Arial;
   border-collapse: collapse;
   table-align: center;
}
 td {
   width: 25%;
   text-align: center;
   vertical-align: top;
   border-collapse: collapse;
   padding: 10px;
}
thead{
	background-color: #34495E;
	color:white;
}
table tr:not(:first-child){
	cursor: pointer;transition: all .25s ease-in-out;
}
table tr:not(:first-child):hover{
	background-color: #ddd;
}
</style>
</head>
<body>
  <table>
    
  <tr>
   <td>Hora de inicio</td>
  </tr>
   <?php
     $idselected=$_GET['ID'];//tengo el id acá pero también necesito la sesión de juego
     $sql="SELECT * FROM sesionminijuego WHERE id=1";
	 $result=mysqli_query($conexion,$sql);
	  date_default_timezone_set('America/Bogota');
	  function rr($ti){
		 return date('Y-m-d H:i:s',$ti);
	    }
	  while($mostrar=mysqli_fetch_assoc($result)){
		 ?>
		 <tr>
		 <td><?php echo rr($mostrar['timeStamp'])?></td>
		 </tr>
		 <?php
		 }
   ?>  
  </table>
  <a href=SesionActividad.php?ID=<?php echo $idselected;?>>
   <button id="bton">Mostrar actividades</button>
  </a>
   <script type="text/javascript">
   </script>
</body>
</html>