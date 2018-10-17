<?php
//necesito que guarde el id que me manden, lo vuelva a mandar y mande el id de la sesión de juego.(crear una función que busque el iddelasesion con el timestamp y devolverlo)
 $conexion=mysqli_connect('servicioweb_db_1','root','password','down');//
 //$conexion=mysqli_connect('localhost','root','','test');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sesion de Juego</title>
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
  <table id="table">
    
  <tr>
   <td>Hora de inicio</td>
  </tr>
   <?php
     $idselected=$_GET['ID'];//ya tengo almacenado en id acá, debo mandar sesión de juego.
     $sql="SELECT * FROM sesionjuego WHERE id=1";
	 $result=mysqli_query($conexion,$sql);
	 date_default_timezone_set('America/Bogota');
	 function rr($ti){
		return date('Y-m-d H:i:s',$ti);
	    }
		
		function rrr($tt){//FUNCIÓN QUE ME DEVUELVE EL ID DE LA SESIÓN CUANDO LE PASO LA FECHA.
		 $tim=strtotime($tt);
		 $sql2= "SELECT IdSesion FROM sesionjuego WHERE timeStamp=$tim";
		 $result2=mysqli_query($conexion,$sql2);
		 return $result2;
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
     <a href=SesionMiniJuego.php?ID=<?php echo $idselected;?>?TIEMPO=<?php?>>
      <button id="bton">Mostrar minijuegos</button>
     </a>

  <script type="text/javascript"> 
      var table = document.getElementById('table'),rIndex;
	  var tiempo=
	  for(var i=1; i< table.rows.length; i++){
		  table.rows[i].onclick= function(){
			  rIndex=this.rowIndex;
			 tiempo=this.cells[0].innerHTML;//falta mandar este valor a la funcion rrr en TIEMPO=
			 console.log(tiempo);
		  };
	  }
  </script>
</body>
</html>