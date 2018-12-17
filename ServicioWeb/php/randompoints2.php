<?php
    		// atraves de este codigo php se extraen los datos de la BD para pasarlos a un array
    		include('./configuration.php');
    		$array = array();
			$connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
	        if (!$connection) {
	            echo "Error: Unable to connect to MySQL." . PHP_EOL;
	            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	        exit;
	        }
  class objeto{
	  public $cfin;
	  public $cinit;
	  public $tipo;
	  public $tiempo;
      function __construct($ci,$cf,$type,$tai){
		  $this->cinit=$ci;
		  $this->cfin=$cf;
		  $this->tipo=$type;
		  $this->tiempo=$tai;
	    }   
	}
  $arra=array();
  //$idselected=$_GET['ID'];
  $ids=$_GET['var3'];
  $taim=$_GET['var2'];//tiempo de el inicio de la actividad que contiene a cada evento.
  $sql="SELECT * FROM Evento WHERE idSesionActividad=".$_GET['var'];//Aquí hay que filtrar por id,idsesion,
  echo $sql;
  $result=mysqli_query($connection,$sql);
  date_default_timezone_set('America/Bogota');
  $i=0;
  while($mostrar =  mysqli_fetch_assoc($result) ){
	  if($mostrar['tipo']==="DandD"){
		  $mostrar['tipo']="1";
	    }else{
		  if($mostrar['tipo']==="touch"){
		  $mostrar['tipo']="2"; 
	     }
	     //print_r($mostrar);
	     //print($mostrar['tipo']);
	  }
	  $o= new objeto($mostrar['coordenadaInicio'],$mostrar['coordenadaFin'],$mostrar['tipo'],$mostrar['timeStamp']-$taim);
	  $arra[$i]=$o;
	  $i++;
 	}
	//print_r($arra);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>dots</title>
  <style type="text/css">
  canvas { border: 5px solid black; 
   background-color:#F7FAFC;
  }

body {
  
  background-color:#A3B8E9  ;
  min-height:10vh;
  align-items:center;
  justify-content:center;
  font-family:Helvetica,Sans-serif;
 
}

p {
  text-align: center;
  font-size: 30px;
  margin-top: 0px;
  color:white
}

a{
	margin: 10px;
}
html {
  font-size: 16px;
}

 .boton_personalizado{
    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;
  }
  </style>
</head>
<body onload="draw();">
<p id="demo"></p>
   <canvas id="tutorial" width="1000" height="400"></canvas>
   <a class="boton_personalizado" id ="anterior">anterior</a>
   <a class="boton_personalizado" id ="comenzar">comenzar</a>
   <form action="/action_page.php">
  <input type="radio" name="coffee" id="acum" value="acum"  >Acumular puntos<br>
  <input type="radio" name="coffee" id="noacum" value="noacum" checked="checked">No acumular puntos<br>
  </form>
  <br></br>
  <select name="select-event" id="selection">
    <option value="" disabled>Tipo de evento</option>
	<option value="todos">Todos</option>
    <option value="dd">Drag and Drop</option>
    <option value="touch">Touch</option>
  </select>
</div>
<a class="boton_personalizado" id="filtro">filtrar</a>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js">  </script>
  
  <script type="text/javascript">
  var b2=false,primera=true,seconds=0,minutes=0


  const esdragdrop=(punto)=>{
	  return punto.tipo=="2"
	  
  }
  const estouch=(punto)=>{
	  return punto.tipo=="1"
  }
  var puntosdrag,puntostouch

var si
function tiempodeinicio(time){
	  si=time;
}
    
var x = setInterval(function() {
	if(b2==true){
	  
		if(primera==true){
		  var countDownDate = new Date().getTime();
		  tiempodeinicio(countDownDate)
		  primera=false
	    }

	 if(seconds===59){
		 seconds=0
		  minutes++
	 }
		document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s "
	}

}, 1000);

  var sesion=[<?php echo $ids?>]
  var vec =  <?php echo json_encode($arra);?>//el vector array va a tener el tipo y las coordenas de inicio y fin respectivamente.
  console.log(vec);
  var array=[],vec2=[];//array
  var boo=false,b=true;
  var tus,momento=-1,m=false,x,una=true,image
  var i=0,s=document.getElementById("selection").value
   puntosdrag=vec.filter(esdragdrop);
   puntostouch=vec.filter(estouch);
   console.log(puntosdrag)
   console.log(puntostouch)
  function posicion(px,py,c,m){//constructor de objetos(touch)
      this.pos1=px;
      this.pos2=py;
      this.cc=c;
	  this.momento=m;
    }
  window.onload=function()
  {
    var canvas = document.getElementById('tutorial');
    if (canvas.getContext) {
      var ctx = canvas.getContext('2d');
    } 
     function pintar(){
		 image=new Image();
		if(sesion[0]===2){
			   image.src= 'visualizacion/imagenes/dado.png';
		}else{
			if(sesion[0]===1){
				 image.src= 'visualizacion/imagenes/cubos.png';
			}else{
				if(sesion[0]===3){
					image.src= 'visualizacion/imagenes/balde.png';
				}else{
					if(sesion[0]===0){
						image.src= 'visualizacion/imagenes/carros.png';
					}else{
						image.src= 'visualizacion/imagenes/basket.png';
					}
				}
			}
		}
	}
    function draw() {
      var dato
			if(document.getElementById('acum').checked) {
				  console.log("holaa")
                 }else if(document.getElementById('noacum').checked) {
                         pintar()
						 ctx.drawImage(image,0,0,1000,500);
                   }
		if(s==="todos"){
			dato=vec
		}else{
			if(s==="dd"){
				dato=puntosdrag
			}else{
				dato=puntostouch
			}
		}		   
		 drawSquare2(dato);
    }
	function drawSquare2(vector){//se usa en la movie para ver que objeto tiene el tiempo igual al momento
      for(x=0;x<vector.length;x++){
         if(momento===vector[x].tiempo){
			 apoyo(vector[x]);
		 }
      }
    }
 	function apoyo(vet){
	   if(vet.tipo=="2"){
				 ctx.fillStyle='#17202A';
			 }else{
				 ctx.fillStyle='#124BD5';
			 }
			 var p =vet.cinit.replace("(","");
			 p=p.replace(")","");
			 var x=p.split(",");
		     ctx.fillRect(x[0]*canvas.width,x[1]*canvas.height, 10, 10);
             ctx.closePath();
	} 
    function animate(){
		 window.setTimeout(animate,1000);
         draw();
    }
	function movie(){
		momento++;
		seconds++
		var hola=document.getElementById("comenzar").innerHTML
		if(hola==="comenzar"){
		 document.getElementById("comenzar").innerHTML="siguiente"
		 b2=true
		}
	}
	function filtro(){
		momento=-1
		seconds=0
		document.getElementById("comenzar").innerHTML="comenzar"
		pintar()
		ctx.drawImage(image,0,0,1000,500);
		alert("Si se cambia el filtro una vez iniciada la recreación, esta se reiniciará")
		 s=document.getElementById("selection").value
		if(s==="touch"){
			
		}else{
			if(s==="dd"){
				
			}else{
				if(s==="todos"){
					
				}
			}
		}
	}
    animate(); 
	document.getElementById("comenzar").addEventListener("click",movie);
	document.getElementById("filtro").addEventListener("click",filtro);
  }
 
  </script>
</body>
</html>
