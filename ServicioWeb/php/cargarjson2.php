<html>
    <head>
        <title>Insertar</title>
    </head>
    <body>
    <?php
        //Recibe el archivo a traves del metodo POST y lo guarda en la carpeta Json's ubicada dentro del volumen PHP
        move_uploaded_file($_FILES['archivo']['tmp_name'] , "uploads/" . $_FILES['archivo']['name']);
        $jsonCont = file_get_contents("uploads/" . $_FILES['archivo']['name']);
        $content = json_decode($jsonCont);
    ?>
    <h2 aling="center"> ¡Guardado Exitoso! </h2>
    <h3><a href="index.php" aling ="center"> Cargar nuevo Archivo .Json</a></h3>
    </body>
</html>
