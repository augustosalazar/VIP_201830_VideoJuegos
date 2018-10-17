<?php
  //Necesito saber cúales serán los tipos de eventos para así a cada uno asignarle un nombre.
  //$conexion=mysqli_connect('localhost','root','','test');
  $conexion=mysqli_connect('servicioweb_db_1','root','password','down');
  $sql="SELECT * FROM evento";//Aquí hay que filtrar por id,idsesion,idsesionminijuego,
  $result=mysqli_query($conexion,$sql);
  date_default_timezone_set('America/Bogota');
  while($mostrar=mysqli_fetch_assoc($result)){
	  if($mostrar['tipo']==="DandD"){
		  $mostrar['tipo']="1";
		$array[]=$mostrar['tipo'].','.$mostrar['coordenadaInicio'].','.$mostrar['coordenadaFin'];  
	  }else{
		  if($mostrar['tipo']==="touch"){
		  $mostrar['tipo']="2";
		  $array[]=$mostrar['tipo'].','.$mostrar['coordenadaInicio'].','.$mostrar['coordenadaFin'];  
	     }
		 
	  }
 	}
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
	background-image: url("http://d2yspv744gxsd1.cloudfront.net/wp-content/uploads/2018/03/21155023/dia-mundial-sindrome-down.jpg");
}
  </style>
</head>
<body onload="draw();">

  <canvas id="tutorial" width="1000" height="400"></canvas>
  <p></p>
  
  <button id="play">Play||Pause</button>
  <form action="/action_page.php">
    <select name="filtro"  id="kk">
      <option value="drag & drop">drag&&drop</option>//rojo
      <option value="touch">touch</option>//azul
      <option value="" selected>move</option>//negro
    </select>
  </form>
  
  <input value="Reload Page" onclick="history.go(0)" type="button">

<button id="demo">Filtrar</button>

<button id="otro">Mostrar todos</button>
  <script type="text/javascript">
   var vec = [ <?php echo implode(',',$array);?> ]//el vector array va a tener el tipo y las coordenas de inicio y fin respectivamente.
  var array=[];//array
  console.log(vec);
  var boo=false,b=true,once=true;
  var tus;
  window.onload=function()
  {
    var canvas = document.getElementById('tutorial');
    if (canvas.getContext) {
      var ctx = canvas.getContext('2d');
    }
    function posicion(px,py,c){//constructor de objetos
      this.posx=px;
      this.posy=py;
      this.cc=c;
    }
   
    var num=Math.random()*200;
    function drawSquare($num){//se llama 100 veces la funcion que crea los nuevos cuadros
      var x=0;
      while(x<100){
        nuevo();
        x++;
      }
    }
    function draw() {
     if(once===true){
        drawSquare();
		once=false;
	 }
      llamar();
    }
    function nuevo(){//creación de objetos
      var x=Math.random()*1000;
      var y=Math.random()*400;
      var c=Math.round(Math.random()*30);
      if(c<=10){
        c= '#990000';
      }else{
        if( c<=20&&c>10){
          c= '#339CFF';
        }else{
          c= '#17202A';
        }
      }
      var element=new posicion(x,y,c);
      array.push(element);
    }
    function llamar(){
      var o=0;
      while(o<100){
        mostrar(array[o].posx,array[o].posy,array[o].cc,tus);
        o++;
      }
    }
    function mostrar(x,y,c,otra){//dibuja los cuadritos
      if(boo===false){
        ctx.fillStyle= c;
        ctx.fillRect(x,y, 8, 8);
        ctx.closePath();
      }else{
        if(c===otra){
          ctx.fillStyle= c;
          ctx.fillRect(x,y, 8, 8);
          ctx.closePath();
        }
      }
    }
    function filtro(){
      var e = document.getElementById("kk"),
      v=e.value,
      txt=e.options[e.selectedIndex].innerText;
      boo=true;
	  b=true;
      if(txt==="drag&&drop"){
        tus='#990000';
      }else{
        if(txt==="move"){
          tus='#17202A';
        }else{
          tus='#339CFF';
        }
      }
	  ctx.clearRect(0, 0, tutorial.width, tutorial.height);
    }
	function refresh(){
	    tus="";
		b=true;
	}
    function animate(){
      window.setTimeout(animate,1000);
	  if(b===true){
       draw();
	   b=false;
   	   boo=false;
	}
    }
	function movie(){//recreación tipo video.
		
	}
    animate();
    document.getElementById("demo").addEventListener("click",filtro);
	document.getElementById("otro").addEventListener("click",refresh);
	document.getElementById("play").addEventListener("click",movie);
  }
  </script>
</body>
</html>