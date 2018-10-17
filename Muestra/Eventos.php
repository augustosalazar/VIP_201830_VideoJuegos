<?php 
//$idselected=$_GET[''];//ya tengo almacenado en id acá, necesito el timestamp de inicio de actividad para después hacer la resta y saber a los cu
  ?>
  <?php
    $conexion=mysqli_connect('servicioweb_db_1','root','password','down');
 //$conexion=mysqli_connect('localhost','root','','test');
?>
<!DOCTYPE html>
<html>
<head>
<title>Eventos</title>
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
</style>
</head>
<body>
  <table>
    
  <tr>
   <td>Hora de inicio</td>
   <td>Tipo</td>
   <td>Coordenada inicio</td>
   <td>Coordenada Final</td>
  </tr>
   <?php
     date_default_timezone_set('America/Bogota');
     $sql="SELECT * FROM evento WHERE id=1";
	 $result=mysqli_query($conexion,$sql);
	 function rr($ti){
		 return date('Y-m-d H:i:s',$ti);
	    }
	  while($mostrar=mysqli_fetch_assoc($result)){
		 ?>
		 <tr>
		 <td><?php echo rr($mostrar['timeStamp'])?></td>
		 <td><?php echo $mostrar['tipo']?></td>
		 <td><?php echo $mostrar['coordenadaInicio']?></td>
		 <td><?php echo $mostrar['coordenadaFin']?></td>
		 </tr>
		 <?php
		 }
   ?>  
  </table>
  <a href=randompoints.php>
   <button id="bton">Visualización</button>
  </a>
   <script type="text/javascript">

   </script>
</body>
</html>