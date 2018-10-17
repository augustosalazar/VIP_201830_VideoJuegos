<?php
//completo
 /* $conexion=mysqli_connect('localhost','root','','test'); */
 $conexion=mysqli_connect('servicioweb_db_1','root','password','down');
?>
<!DOCTYPE html>
<html>
<head>
<title>ShowData</title>
<style>
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
   <td>Id</td>
   <td>NombreJugador</td>
   <td>NivelJugador</td>
   <td>Edad</td>
  </tr>
   <?php
     $sql="SELECT * FROM jugador";
	 $result=mysqli_query($conexion,$sql);
	 date_default_timezone_set('America/Bogota');
	  while($mostrar=mysqli_fetch_assoc($result)){
		 ?>
		 <tr>
		 <td><?php echo $mostrar['id'] ?></td>
		 <td><?php echo $mostrar['nombreJugador']?></td>
		 <td><?php echo $mostrar['nivelJujador']?></td>
		 <td><?php echo $mostrar['edadJugador']?></td>
		 </tr>
		 <?php
		 }
   ?>  
  </table>
  <form action="SesionDeJuego.php" method="get">
    <input name ="ID" id ="aa" type="text" style="visibility:hidden">
    <a href=SesionDeJuego.php>
      <button id="bton">Mostrar actividades</button>
    </a>
  </form>
</div>
   <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js""></script> 
   <script type="text/javascript" >
      var table = document.getElementById('table'),rIndex;
	  var i;
	  for(var i=1; i< table.rows.length; i++){
		  table.rows[i].onclick= function(){
			  rIndex=this.rowIndex;
			 document.getElementById('aa').value=this.cells[0].innerHTML;//en su momento será reemplazada por la de abajo
			 i=this.cells[0].innerHTML;
		  };
	  }
   </script>
</body>
</html>







































<!-- <!DOCTYPE html>
<html>
<head>
</head>
<body>
 <script type="text/javascript">
 var vertices=[];
            function nodo(name,x,y,ar){//constructor de vertices.
				this.adyacentes=[];
				this.name=name;
				this.x=x;
				this.y=y;
				this.pesorelativo=0;
				this.adyacentes=ar;
			}
			var ar=[1,2,3,4,5];
			var jj=new nodo("f",20,30,ar);
			jj.pesorelativo=20;
		    console.log(jj.adyacentes);
			 console.log(jj.pesorelativo);
			vertices.push(jj);
			ar=vertices;
			console.log("este es ar despues de ser copiado ");
			console.log(ar);
			console.log("este es vertices inicial");
			console.log(vertices);
			ar.splice(0,1);
			console.log("este es ar despues de eliminar su unico elemento: ");
			console.log(ar);
			console.log("este es vertices despues de haber hecho un cambio en ar");
			console.log(vertices); 
			console.log(vertices[0].adyacentes);
			ar=vertices[0].adyacentes;
 </script>
</body>
</html> 
