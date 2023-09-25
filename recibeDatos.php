<?php
    require_once('conexionbd.php');
    $IDTarjeta  = $_POST['IDTarjeta'];
    $Potenciometro = $_POST['Potenciometro'];
    //$Led = $_POST['Led'];

    $conn = new conexionbd();
    $query = "SELECT * FROM device_state WHERE IdDevice ='$IDTarjeta'";
    $select =mysqli_query($conn->conectarBD(), $query);
    if($select->num_rows){
        $query= "UPDATE device_state SET Potenciometro=$Potenciometro WHERE IdDevice='$IDTarjeta'";
        $update = mysqli_query($conn->conectarBD(), $query);
        
        $query = "INSERT INTO devicehistoric(IdDevice,variable,valor,fecha) VALUES('$IDTarjeta','Potenciometro','$Potenciometro',NOW())";
        $insert =mysqli_query($conn->conectarBD(), $query);

        //$query = "INSERT INTO devicehistoric(IdDevice,variable,valor,fecha) VALUES('$IDTarjeta','Led','$Led',NOW())";
        //$insert =mysqli_query($conn->conectarBD(), $query);
        
       $cnn =new conexionbd();
        $query = "SELECT Led, ServoMotor FROM device_state WHERE IdDevice ='$IDTarjeta'";
        $result =mysqli_query($cnn->conectarBD(), $query);
       
        $query = "SELECT Led,ServoMotor FROM device_state WHERE IdDevice ='$IDTarjeta'";
        $result =mysqli_query($cnn->conectarBD(), $query);
        $row =mysqli_fetch_row($result);
        echo "{Led:".$row[0].",   ServoMotor:".$row[1]."}";
        
   }else{
    echo 'Tarjeta no encontrada';    
   }
   
?>