<?php
    require_once('conexionbd.php');
    $IDTarjeta = $_POST['IDTarjeta'];
    $servo = $_POST['ServoMotor'];
    $Led = $_POST['Led'];

    $cnn = new conexionbd();

    if($Led > -1){
        $query = "UPDATE device_state SET Led = $Led WHERE IdDevice = '$IDTarjeta';";
        $update = mysqli_query($cnn -> conectarBD(), $query);

        $query = "INSERT INTO device_historic(IdDevice, variable, valor, fecha) VALUES('$IDTarjeta','Led','$Led',NOW());";
        $insert = mysqli_query($cnn -> conectarBD(), $query);
    }

        $query = "UPDATE device_state SET ServoMotor = $servo WHERE IdDevice = '$IDTarjeta';";
        $update = mysqli_query($cnn -> conectarBD(), $query);
        
        $query = "INSERT INTO device_historic(IdDevice, variable, valor, fecha) VALUES('$IDTarjeta','ServoMotor','$servo',NOW());";
        $insert = mysqli_query($cnn -> conectarBD(), $query);

        echo "<script> 
            location.href='enviaDatos.php?id=$IDTarjeta';
        </script>"
    ?>
