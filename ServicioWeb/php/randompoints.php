<?php
    		// atraves de este codigo php se extraen los datos de la BD para pasarlos a un array
    		include('../configuration.php');
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
:root {
	--bg: #3C465C;
	--primary: #78FFCD;
	--solid: #fff;
	--btn-w: 10em;
	--dot-w: calc(var(--btn-w)*.2);
	--tr-X: calc(var(--btn-w) - var(--dot-w));
}
* {box-sizing: border-box;}
*:before, *:after {box-sizing: border-box;}

body {
  margin:0;
  background-color:#191919;
  min-height:10vh;
  align-items:center;
  justify-content:center;
  font-family:Helvetica,Sans-serif;
}
a {
  text-decoration:none;
  color:#FFF;
}
.rainbow-button {
  width:calc(20vw + 6px);
  height:calc(8vw + 6px);
  background-image: linear-gradient(90deg, #00C0FF 0%, #FFCF00 39%, #FC4F4F 80%, #00C0FF 100%);
  border-radius:4px;
  display:flex;
  align-items:center;
  justify-content:center;
  text-transform:uppercase;
  font-size:2vw;
  font-weight:bold;
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
.rainbow-button:after {
  content:attr(alt);
  width:20vw;
  height:8vw;
  background-color:#191919;
  display:flex;
  align-items:center;
  justify-content:center;
}
.rainbow-button:hover {
  animation:slidebg 2s linear infinite;
}

@keyframes slidebg {
  to {
    background-position:20vw;
  }
}
p {
  text-align: center;
  font-size: 30px;
  margin-top: 0px;
  color:white
}


/* ===== Resets and Housekeeping ===== */
* {
  padding: 0;
  margin: 0;
}

html {
  font-size: 16px;
}



/* ===== Actual Styles ===== */

/* ===== Horizontal Rule ===== */
.rule {
  margin: 10px 0;
  border: none;
  height: 1.5px;
  background-image: linear-gradient(left, #f0f0f0, #c9bbae, #f0f0f0);
}

/* ===== Select Box ===== */
.sel {
  font-size: 1rem;
  display: inline-block;
  margin: 3em 2em;
  width: 350px;
  background-color: transparent;
  position: relative;
  cursor: pointer;
}

.sel::before {
  position: absolute;
  content: '\f063';
  font-family: 'FontAwesome';
  font-size: 2em;
  color: #FFF;
  right: 20px;
  top: calc(50% - 0.5em);
}

.sel.active::before {
  transform: rotateX(-180deg);
}

.sel__placeholder {
  display: block;
  font-family: 'Quicksand';
  font-size: 2.3em;
  color: #838e95;
  padding: 0.2em 0.5em;
  text-align: left;
  pointer-events: none;
  user-select: none;
  visibility: visible;
}

.sel.active .sel__placeholder {
  visibility: hidden;
}

.sel__placeholder::before {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 0.2em 0.5em;
  content: attr(data-placeholder);
  visibility: hidden;
}

.sel.active .sel__placeholder::before {
  visibility: visible;
}

.sel__box {
  position: absolute;
  top: calc(100% + 4px);
  left: -4px;
  display: none;
  list-style-type: none;
  text-align: left;
  font-size: 1em;
  background-color: #FFF;
  width: calc(100% + 8px);
  box-sizing: border-box;
}

.sel.active .sel__box {
  display: block;
  animation: fadeInUp 500ms;
}

.sel__box__options {
  display: list-item;
  font-family: 'Quicksand';
  font-size: 1.5em;
  color: #838e95;
  padding: 0.5em 1em;
  user-select: none;
}

.sel__box__options::after {
  content: '\f00c';
  font-family: 'FontAwesome';
  font-size: 0.5em;
  margin-left: 5px;
  display: none;
}

.sel__box__options.selected::after {
  display: inline;
}

.sel__box__options:hover {
  background-color: #ebedef;
}

/* ----- Select Box Black Panther ----- */
.sel {
  border-bottom: 4px solid rgba(0, 0, 0, 0.3);
}

.sel--black-panther {
  z-index: 3;
}

/* ----- Select Box Superman ----- */
.sel--superman {
/*   display: none; */
  z-index: 2;
}

/* ===== Keyframes ===== */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translate3d(0, 20px, 0);
  }

  to {
    opacity: 1;
    transform: none;
  }
}

@keyframes fadeOut {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
  }
}
  </style>
</head>
<body onload="draw();">
<p id="demo"></p>
  <form>
   <canvas id="tutorial" width="1000" height="400"></canvas>
   <p id="demo"></p>
   <input name ="ID" id ="aa" type="text" style="visibility:hidden">
   <a href="#" class="rainbow-button" alt="play" id ="play"></a>
  </form>
   
    <div class="sel sel--black-panther" id="jaime">
  <select name="select-profession" id="selection">
    <option value="" disabled>Tipo de evento</option>
	<option value="todos">all</option>
    <option value="dd">Drag and Drop</option>
    <option value="touch">Touch</option>
  </select>
</div>
<a class="boton_personalizado" id="filtro">filtrar</a>
<br></br>
 <button class="boton_personalizado" id="cero"> desde cero</button>
 
  <form action="randompoints2.php" method="get">
      <input name ="var3" id ="mm" type="text" style= "visibility: hidden">
     <input name ="var" id ="ai" type="text" style= "visibility: hidden">
     <input name ="var2" id ="aaa" type="text" style= "visibility: hidden">
	 <button class="boton_personalizado" id="segunda"> siguiente recreación</button>
 </form> 
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.3.1.min.js">  </script>
  
  <script type="text/javascript">
  var b2=false,primera=true,seconds=0,minutes=0
 $('.sel sel--black-panther').change(function() {
     alert($(this).val());
});
/* ===== Logic for creating fake Select Boxes ===== */
$('.sel').each(function() {
  $(this).children('select').css('display', 'none');
  
  var $current = $(this);
  
  $(this).find('option').each(function(i) {
    if (i == 0) {
      $current.prepend($('<div>', {
        class: $current.attr('class').replace(/sel/g, 'sel__box')
      }));
      
      var placeholder = $(this).text();
      $current.prepend($('<span>', {
        class: $current.attr('class').replace(/sel/g, 'sel__placeholder'),
        text: placeholder,
        'data-placeholder': placeholder
      }));
      
      return;
    }
    
    $current.children('div').append($('<span>', {
      class: $current.attr('class').replace(/sel/g, 'sel__box__options'),
      text: $(this).text()
    }));
  });
});

// Toggling the `.active` state on the `.sel`.
$('.sel').click(function() {
  $(this).toggleClass('active');
});

// Toggling the `.selected` state on the options.
$('.sel__box__options').click(function() {
  var txt = $(this).text();
  var index = $(this).index();
  
  $(this).siblings('.sel__box__options').removeClass('selected');
  $(this).addClass('selected');
  
  var $currentSel = $(this).closest('.sel');
  $currentSel.children('.sel__placeholder').text(txt);
  $currentSel.children('select').prop('selectedIndex', index + 1);
});

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

   
	 if(seconds<59){
		 seconds++
	 }else{
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
  var tus,momento=0,m=false,x,una=true,image,filter=false
  var i=0;
   puntosdrag=vec.filter(esdragdrop);
   puntostouch=vec.filter(estouch);
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
			   image.src= 'imagenes/dado.jpeg';
		}else{
			if(sesion[0]===1){
				 image.src= 'imagenes/cubos.jpeg';
			}else{
				if(sesion[0]===3){
					image.src= 'imagenes/balde.jpeg';
				}else{
					if(sesion[0]===0){
						image.src= 'imagenes/carros.jpeg';
					}else{
						image.src= 'imagenes/basket.jepg';
					}
				}
			}
		}
	}
    function draw() {
		if(una===true){
			pintar()
	       ctx.drawImage(image,0,0,1000,500);
		   una=false
		}
		
      if(m===true){
		 drawSquare2();
		 momento++;
	    }
		
		
		
    }
	function drawSquare2(){//se usa en la movie para ver que objeto tiene el tiempo igual al momento
      for(x=0;x<vec.length;x++){
         if(momento===vec[x].tiempo){
			 apoyo(vec[x]);
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
	function movie(){//recreación tipo video.
		m=!m;
		
		if(m===true){

		}
		var hola=play.getAttribute('alt');
		if(hola==="play"){
		 
		 play.setAttribute('alt', 'pause');
		 b2=true
	
		}else{
			 play.setAttribute('alt', 'play');
			 b2=false
		}
		if(filter==true){
			ctx.drawImage(image,0,0,1000,500);
		    pintar()
			filter=false
		}
	}
	function filtro(){
		alert("Esta propiedad solo muestra todos los puntos de la actividad que pertenecen a el tipo deseado.")
		filter=true
		ctx.drawImage(image,0,0,1000,500);
		pintar()
	var s=document.getElementById("selection").value
		if(s==="touch"){
			for(var counter=0; counter< puntostouch.length; counter++){
		       apoyo(puntostouch[counter]);
	        }
		}else{
			if(s==="dd"){
				for(var counter2=0; counter2< puntosdrag.length; counter2++){
		          apoyo(puntosdrag[counter2]);
	            }
			}else{
				if(s==="todos"){
					for(var counter3=0; counter3< vec.length; counter3++){
		              apoyo(vec[counter3]);
	                }
				}
			}
		}
	}
	function denuevo(){
		momento=0
		ctx.drawImage(image,0,0,1000,500);
		pintar()
		seconds=0
		minutes=0
		console.log(tiempo)
	}
	function next(){
		var tiempo=(<?php echo $taim;?>)
		console.log(tiempo)
		document.getElementById('mm').value=[<?php echo $ids;?>];
		document.getElementById('ai').value=[<?php echo $idselected;?>];
        document.getElementById('aaa').value=tiempo
	}
    animate(); 
	document.getElementById("play").addEventListener("click",movie);
	document.getElementById("filtro").addEventListener("click",filtro);
	document.getElementById("cero").addEventListener("click",denuevo);
	document.getElementById("segunda").addEventListener("click",next);
  }
 
  </script>
</body>
</html>
