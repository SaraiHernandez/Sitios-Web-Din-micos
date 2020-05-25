
<?php
include"conectar.php";
$vCveSa=$_POST['cveSabor'];
$vNomSab=$_POST['nomSabor'];
$vNomMedida=$_POST['nombreMedida'];
$vBoton=$_POST['boton'];
$resConectar=conecta();
$sqlMedida="SELECT cveMedida FROM MEDIDA
WHERE nomMedida='$vNomMedida';";
$sqlCveMedida=mysql_query($sqlMedida,$resConectar);
$resulCveMedida=mysql_fetch_array($sqlCveMedida);
$vCveMedida=$resulCveMedida["cveMedida"];
if ($vBoton=="Guardar") {
$sqlAltaSab="INSERT INTO SABOR
VALUES('$vCveSab','$vNomSab','$vCveMedida');";
$guarda=mysql_query($sqlAltaSab,$resConectar);
if(!$guarda){
echo"<SCRIPT LANGUAGE='Javascript'TYPE='text/Javascript'>
alert('Ocurrio un error...Posible clave repetida')
Javascript:history.back(1)
</SCRIPT>";
}
else{
echo"<SCRIPT LANGUAGE='Javascript'TYPE='text/Javascript'>
alert('Sabor registrado')
window.location='../index.html'
</SCRIPT>";
}
}
else {
$sqlModSab="UPDATE SABOR
SET nomSab='$vNomSab',cveMedida='$vCveMedida'
WHERE cveSab='$vCveSab';";
$modificar=mysql_query($sqlModSab;$resConectar);
if(!$modificar){
echo"<SCRIPT LANGUAGE='Javascript' TYPE='text/Javascript'>
alert('Ocurrio un error...No se guardo el registro')
Javascript:history.back(1)
</SCRIPT>";
}
else{
echo"<SCRIPT LANGUAGE='Javascript'TYPE='text/Javascript'>
alert('Sabor modificado')
window.location='consultaSabor.php'
</SCRIPT>";
}
}
?>