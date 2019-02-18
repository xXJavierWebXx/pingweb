<?php
$url = "visas.migracion.gob.pa";

$conexion = @fsockopen($url, 80, $errno, $errstr, 30);
if (!$conexion) {
echo "Uno Offline</br>";
$uno=0;
} else {
//echo "Online</br>";
$uno=1;
fclose($conexion);
}

$url = "200.46.78.75";

$conexion = @fsockopen($url, 80, $errno, $errstr, 30);
if (!$conexion) {
echo "Dos Offline</br>";
$dos=0;
} else {
//echo "Online</br>";
$dos=1;
fclose($conexion);
}


#Variable URL
$urlvar=$_GET["id"];
#CORREOS
#$para[]="javipers@gmail.com";
#$para[]="brett.francelys@gmail.com";
#$para[]="a27r04@hotmail.com";
#$para[]="esthermce@gmail.com";
#$para[]="rizalesjose@gmail.com";
#$para[]="jrbala32@gmail.com";
#$para[]="thorpresupuesto.am@gmail.com";
#$para[]="v.lalvarez@hotmail.com";
#$para[]="neydadesousa@gmail.com";
#$para[]="prietoak@gmail.com";
#$para[]="curapiacax@gmail.com";
#$para[]="pever.ramirez@gmail.com";


if ($uno==1)
{
$file = file('http://visas.migracion.gob.pa/SIVA/form_CITAS/form_CITAS.php?id=78539258157d81fe7d991c5095035511');

foreach($file as $linenum => $line){
     if ($urlvar==1)
                    {
    echo "<b>Line #{$linenum}</b> ".htmlspecialchars($line).'</br> ';
                    }
    $lineas="{$linenum}";
}



#BUSCAR PALABRA form_CITAS.php
$palabraFormCitas = file('http://visas.migracion.gob.pa/SIVA/verif_citas_ven/');
$cadenaBuscarF="form_CITAS.php";
foreach($palabraFormCitas as $palabrasForm => $palabraF){
    //echo "<b>Line #{$palabras}</b> ".htmlspecialchars($palabraF).'</br> ';
    $cadenaPalabraF=$cadenaPalabraF ."</br>". htmlspecialchars($palabraF);
}

                # revisamos si existe la palabra a buscar en el contenido del archivo
                if(strpos($cadenaPalabraF, $cadenaBuscarF)!==false)
                {
                    $validaF=1;
                       echo $valor1="OK - ".$cadenaBuscarF."</br>";
                }
                else
                {
                    if ($urlvar==1)
                    {
                    echo "NO - ".$cadenaBuscarF."</br>";
                    }
                }
}

if ($dos==1)
{
#BUSCAR PALABRA http://visas.migracion.gob.pa/SIVA/verif_citas_ven/
$palabraFrame = file('http://200.46.78.75/portal_migracion_digital/views/visa_venezuela.php');
$cadenaBuscarFr="http://visas.migracion.gob.pa/SIVA/verif_citas_ven/";
foreach($palabraFrame as $palabrasfr => $palabraFr){
    //echo "<b>Line #{$palabrasfr}</b> ".htmlspecialchars($palabraFr).'</br> ';
    $linepalabra="{$palabrasfr}";
    $cadenaPalabraFr=$cadenaPalabraFr ."</br>". htmlspecialchars($palabraFr);
}

//echo $cadenaPalabraFr;
                # revisamos si existe la palabra a buscar en el contenido del archivo
                if(strpos($cadenaPalabraFr, $cadenaBuscarFr)!==false)
                {
                    $validaFr=1;

                }

                if ($validaFr!=1)
                    {
                      echo $valor2="OK - ".$cadenaBuscarFr." CAMBIO</br>";
                    }
                    else
                    {
                         if ($urlvar==1)
                    {
                        echo "NO - ".$cadenaBuscarFr." CAMBIO</br>";
                    }
                    }

}

if ($uno==1)
{
if ($lineas!=29)
{
   // echo "<div align='center'>SE ACTIVO LA WEB DE CITAS</div>";
      echo $valor3="OK - MAS DE 29 LINEAS</br>";
}
else
{
     if ($urlvar==1)
                    {
                       // echo "<div align='center'>NO ESTA ACTIVA LA WEB DE CITAS</div>";
    echo "NO - MAS DE 29 LINEAS</br>";
                    }
}
}

if ($uno==0 or $dos==0)
{

}
else
{
if ($lineas!=29 or $validaF==1 or $validaFr!=1)
{


$subject="ESTÁ ACTIVA LA WEB DE VISA";

$body='<style type="text/css">
.ok {
    text-align: justify;
}
</style>
<style type="text/css">
<!--
.Estilo1 {
color: #0066CC;
font-weight: bold;
}
.Estilo2 {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
color: #006699;
}
-->
</style>


<p><strong>se habilito la web de la visa corre y registrate</strong></p>
<p><span class="Estilo2"><a href="http://200.46.78.75/portal_migracion_digital/views/visa_venezuela.php">IR A SISTEMA DE VISA</a></span></p>
</br>
</br>
</br>';




 // Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From: Citas Panama-Venezuela <noreply@thorholdings.com>' . "\r\n";
#$cabeceras .= 'Cc: norikalaya19@hotmail.com' . "\r\n";
foreach ($para as $correo) {
mail($correo, $subject, $body, $cabeceras);
}
}
}
/**/
?>
