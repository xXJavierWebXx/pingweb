 <script>setTimeout('document.location.reload()',10000); </script>
<script src="js/soundmanager2.js"></script>
<script src="node_modules/push.js/bin/push.js"></script>

<?php
//USUARIOS ONLINE

if($_SERVER["HTTP_X_FORWARDED_FOR"])
{
    if($pos=strpos($_SERVER["HTTP_X_FORWARDED_FOR"]," "))
    {
        $IPP=substr($_SERVER["HTTP_X_FORWARDED_FOR"],0,$pos);
        $hostlocal=substr($_SERVER["HTTP_X_FORWARDED_FOR"],$pos+1);
    }else{
        $IPP=$_SERVER["HTTP_X_FORWARDED_FOR"];
        $hostlocal=$_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    if($_SERVER["REMOTE_ADDR"])
        $IPP=$_SERVER["REMOTE_ADDR"];
    }else{
    echo "&ippublica=".$_SERVER["REMOTE_ADDR"];
    $hostlocal=$_SERVER["REMOTE_ADDR"];
    if($hostlocal!=$_SERVER["REMOTE_ADDR"])
        $IPP=$hostlocal;
    }

$archivo="usuarios.dat";
$inactivo=600;
$contar=0;

$file = fopen($archivo, "r");
while(!feof($file)) {
//echo fgets($file). "<br />";
$IPES=trim(fgets($file));
//echo $IPES."=".$hostlocal."</br>";
if ($IPES==$hostlocal)
{
$EXISTE=1;
}
}

fclose($file);

if ($EXISTE!=1)
{
$fp=fopen($archivo,"a");
fwrite($fp, $hostlocal . PHP_EOL);
fclose($fp);
}

if ($_GET["us"]==1)
{

echo $IPES;

}


//SISTEM
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
#$para[]="brett.francelys@gmail.com";
#$para[]="javipers@gmail.com";
#$para[]="garcia.rossy@gmail.com";
#$para[]="dcarolina.rg@gmail.com";
#$para[]="norikalaya19@hotmail.com";
#$para[]="soporte@shimodacorp.com";
#$para[]="";
#$para[]="";

if ($uno==1)
{
$file = file('http://visas.migracion.gob.pa/SIVA/form_CITAS/form_CITAS.php?id=78539258157d81fe7d991c5095035511');

foreach($file as $linenum => $line){
     if ($urlvar==1)
                    {
  //  echo "<b>Line #{$linenum}</b> ".htmlspecialchars($line).'</br> ';
                    }
    $lineas="{$linenum}";
}

//echo "N° de Lineas= <b>".$lineas."</b></br>";


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
                    $alarma=1;
                       //echo $valor1="OK - ".$cadenaBuscarF."</br>";
                }
                else
                {
                    if ($urlvar==1)
                    {
                    //echo "NO - ".$cadenaBuscarF."</br>";
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
                        $alarma=1;
                       //echo $valor2="OK - ".$cadenaBuscarFr." CAMBIO</br>";
                    }
                    else
                    {
                         if ($urlvar==1)
                    {
                       // echo "NO - ".$cadenaBuscarFr." CAMBIO</br>";
                    }
                    }

}

if ($uno==1)
{
if ($lineas!=29)
{
    echo "<div align='center'><FONT FACE='impact' SIZE=8 COLOR='green'>SE ACTIVO LA WEB DE CITAS</FONT></div>";
    echo "<div align='center'><FONT FACE='impact' SIZE=5 COLOR='green'><a href='http://visas.migracion.gob.pa/SIVA/form_CITAS/form_CITAS.php?id=78539258157d81fe7d991c5095035511' target='_blank'>PAGINA DE FORMULARIO</a>";
    echo "<div align='center'><FONT FACE='impact' SIZE=5 COLOR='green'><a href='http://200.46.78.75/portal_migracion_digital/views/visa_venezuela.php' target='_blank'>PAGINA DE FORMULARIO MIGRACION</a>";

     // echo $valor3="OK - MAS DE 29 LINEAS</br>";
      $alarma=1;
}
else
{
     if ($urlvar==1)
                    {
    echo "<div align='center'><FONT FACE='impact' SIZE=8 COLOR='red'>NO ESTA ACTIVA LA WEB DE CITAS</FONT></div>";
    echo "<div align='center'><FONT FACE='impact' SIZE=3 COLOR='red'>Esta Web Se Auto-Recarga Para Verificar el estatuto de la web de CITAS para VISA PANAMEÑAS</FONT></div>";
   // echo "NO - MAS DE 29 LINEAS</br>";
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
?>
<script>
    // where to find flash SWFs, if needed...
    soundManager.url = '/path/to/swf-files/';

    soundManager.onready(function() {
        soundManager.createSound({
            id: 'mySound',
            url: 'sound/alarma.mp3'
        });

        // ...and play it
        soundManager.play('mySound');
    });
</script>
</br>
</br>

 <?php
        echo '<script>
        Push.create("Notificacion Visa",{
            body: "Se ha activado la web Citas Visas Panameñas",
            icon: "img/bien.png",
            timeout: 10000,
            vibrate: [200, 100],
            onClick: function () {
                window.focus();
                   window.location="http://200.46.78.75/portal_migracion_digital/views/visa_venezuela.php";
                this.close();
            }
        });
    </script>';
}
}

?>




<?php
/*
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
