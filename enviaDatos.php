<?php
    $IDTarjeta  = $_GET['id'];
    require_once('conexionbd.php');
    $conn = new conexionbd();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Datos</title>
</head>
   <center style="font-size: 22px;"> 
        <div style='box-shadow: 12px 18px 30px #191970; padding: 20px; width: 300px; display: inline-block; margin: 30px;'>
            <form action= "actuador.php" method="post">  
                <label name=""><?php echo $IDTarjeta  ?></label>
                <input type="hidden" name="IDTarjeta" value="<?php echo $IDTarjeta?>"><br><br>       
            
                <label> Led:</label>
                <select name="Led">
                <option>0</option>
                <option>1</option>
                </select><br><br>
                
                Valor del servo: <input type="range" name="ServoMotor" min="0" max="180" step="5" value="<?php echo $row['ServoMotor']?>"><br><br>
                  
                    
                <input type="submit" value="Enviar" style="color:fff;background-color:#00BFFF;border-color:#00BFFF;border-radius: 5px; font-size: 20px;">
            </form>
        </div>        
    </center>
    <center style="font-size: 20px;">
        <div style='box-shadow: 12px 18px 30px #191970; padding: 20px; width: 500px; display: inline-block; margin: 30px;'>
        <?php
        echo'
        <table  border="1" class="Tabla">
        ';
        echo'
            <tr>
                <th>IdDevice</th>
                <th>Potenciometro</th>
                <th>Led</th>
                <th>Servo Motor</th>
            </tr>
        ';
        echo'
            <tbody>
        ';
        $cnn = new conexionbd();
        $query= "SELECT * FROM device_state WHERE IdDevice='$IDTarjeta'";
        $select = mysqli_query($cnn->conectarBD(),$query);

        while($row = $select->fetch_assoc()){
            echo'<tr>';
                echo'<td scope=row">'; echo $row['IdDevice']; echo'</td>
                <td>';echo $row['Potenciometro']; echo'</td>
                <td>'; echo $row['Led']; echo'</td>
                <td>'; echo $row['ServoMotor']; echo'</td>
                
            </tr>';
        }
        echo'
        </tbody>
        </table>
        
        ';
        ?>
                </div>
    </center>
</body>
</html>

