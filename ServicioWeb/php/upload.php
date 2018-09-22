<?php
    if(isset($_POST['name']) && isset($_POST['data'])){
        $uploaded_file = 'uploads/'.date("U").'-r.txt';
        file_put_contents($uploaded_file, $_POST['data']);
        echo "uploaded.";
    }else{
        echo "invalid file uploaded.";
    }
?>
