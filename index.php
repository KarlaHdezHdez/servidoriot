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
        <?php
            require_once('conexionbd.php');
            $conn = new conexionbd();

                echo'
                <table class="Tabla">
            ';
            echo'
                <tr>
                    <th>Tarjetas Disponibles</th>
                </tr>
            ';
            echo'
                <tbody>
            ';
            $cnn = new conexionbd();

            $query= "SELECT * FROM device_state";
            $select = mysqli_query($cnn->conectarBD(),$query);

            while($row = $select->fetch_assoc()){
                echo'<tr>';
                    echo'<td scope=row"><a href="enviaDatos.php?id='.$row['IdDevice'].'">' .$row['IdDevice'].'</a></td>
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

