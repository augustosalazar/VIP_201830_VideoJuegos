<?php
    include('../configuration.php');
?>
<html>
    <head>
        <title>Visualización de datos</title>
        <script src="p5.min.js"></script>
    </head>
    <body>
    	<?php
    		// atraves de este codigo php se extraen los datos de la BD para pasarlos a un array
    		$array = array();
			$connection = mysqli_connect($db_host,$db_username,$db_password,$db_schema);
	        if (!$connection) {
	            echo "Error: Unable to connect to MySQL." . PHP_EOL;
	            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	        exit;
	        }       
	        $query = "SELECT * FROM Evento WHERE idSesionActividad=". $_GET['var'];
	        $result = mysqli_query($connection,$query);  
	        $i=0;
	        while ($row = mysqli_fetch_row($result)){
	        	$aux = array();
	        	for ($j=0; $j < count($row); $j++) { 
	        		$aux[$j]=$row[$j];
	        	}
	        	$array[$i]= $aux;
	        	$i++;
	        }  
    		mysqli_close($connection); 
    	?>    	
    	<script>
    		var data;
	        var puntos = [];
	        var g;
	        var time;
	        var btn = document.getElementById("time");

	        //El preload se carga antes de iniciar el programa
	        function preload() {
	        	//Se extrae el array hecho en el codigo php, y se guarda en un array de JS
	        	data = <?php echo json_encode($array);?>;
	        }

	        //Configura las caracteriticas y carga los datos necesarios del canvas antes de dibujar 
	    	function setup() { 
				g = loadImage(escenario(<?php echo $_GET['var2']; ?>));
				createCanvas(800, 450);
				loadData();
	        }

	        //Dibuja, se ejecuta continuemente
			function draw() {
				background(g);

				//Dibuja todos los puntos
				for (var i = 0; i < puntos.length; i++) {
					//if(puntos[i].time == time){
						if (puntos[i].tipo == "touch"){
							stroke(93,155,155);
							fill(93,100,255);
							}else{
								if(puntos[i].tipo == "DAndD"){
									stroke(255,0,5);
									fill(255,0,3);
							}
						}
					puntos[i].display();
					//}          
				}
			}

			//esta función guarda los datos del evento en un array de puntos
		    function loadData() {
		    	for (var i = 0; i < data.length; i++) {
		    		var x1 = escalarx(coordenadasX(data[i][3]));
		    		var y1 = escalary(coordenadasY(data[i][3]));
		    		var x2 = escalarx(coordenadasX(data[i][4]));
		    		var y2 = escalary(coordenadasY(data[i][4]));
		    		var tiempo = (new Date(data[i][1])).toUTCString();
		    		var tipo = data[i][2];
		    		puntos.push(new Point(x1, y1, 5, tiempo, tipo));
		    		puntos.push(new Point(x2, y2, 5, tiempo, tipo));
		    	}
	        }

	        //las siguientes dos funciones extraen la coordenada x & y de la cadena coordenada que se obtine de la base de datos
	        function coordenadasX(x){
	        	var i = 0;
	        	var resultado = "";
	        	while(i < x.length){
	        		if (x.substring(i,i+1) == ","){
	        			return resultado;
	        		}
	        		if (x.substring(i,i+1) != "("){
	        			resultado = resultado + x.substring(i,i+1);
	        		}
	        		i++;
	        	}
	        }

	       	function coordenadasY(y){
	        	var i = 0;
	        	var sw = true;
	        	var resultado = "";
	        	while(i < y.length){
	        		if(sw == true){
	        			if (y.substring(i,i+1) == ","){
	        				sw = false;
	        			}
	        		}else{
			        	if (y.substring(i,i+1) == ")"){
		        			return resultado;
		        		}
	        			if (y.substring(i,i+1) != ","){
		        			resultado = resultado + y.substring(i,i+1) ;
			        	}
	        		}
	        		i++;
	        	}
	        }

	        //la siguientes dos funciones escalan las coordenadas en X & y de 0-1 a el tamaño del canvas
	        function escalarx(x){
	        	return (x*800);
	        }

	        function escalary(y){
	        	return (450-(y*450));
	        }

	        //Dependiendo del evento carga una imagen
	        function escenario(nombre_actividad){
	        	switch(nombre_actividad) {
				    case 0:
				        return ("imagenes/carros.png");
				        break;
				    case 1:
				        return ("imagenes/cubos.png");
				        break;
				    case 2:
				    	return ("imagenes/dados.png");
				        break;
				    case 3:
				    	return ("imagenes/juguetes.png");
				        break;
			        case 4:
			        	return ("imagenes/cesta.png");
				        break;
				    default:
				    	return ("carros.png");
				} 
	        }

	        // Este es el objeto punto qeu contiene la informacion de cada evento extraido de la BD
			function Point(x, y, diameter, time, tipo) {
				this.x = x;
				this.y = y;
				this.diameter = diameter;
				this.radius = diameter / 2;
				this.time = time;
				this.tipo = tipo;

				// Dibuja el punto
				this.display = function() {
					ellipse(this.x, this.y, this.diameter, this.diameter);
				};
			}
    	</script>	
    </body>
</html>