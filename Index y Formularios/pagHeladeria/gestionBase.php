
<HEAD>
<META HTTP-EQUIV="content-Type" CONTENT="text/html;
CHARSET=utf-8"/>
<TITLE>Formulario de modificaciones de sabores</TITLE>
<LINK HREF="../estilos/estiloSabor.css"
REL="stylesheet" TYPE="text/css"/>
<SCRIPT LANGUAGE="Javascript" TYPE="text/Javascript">
function modificar()
{
if(confirm('¿Confirma los cambios?'))
document.formCambios.submit()
}
</SCRIPT>
</HEAD>
<BODY>
<?php
include"conectar.php";
$vCveSab=$_POST['cveSabor'];
$vNomSab=$_POST['nomSabor'];
$vNomMedida=$_POST['nomMedida'];
$resConectar=conecta();
if(isset($_POST['botonG'])=='Modificar'){
echo'<FORM ID="formCambios" NAME="formCambios"
METHOD="post" ACTION="actBase.php"
ENCTYPE="multipart/form-data">';
echo'<P CLASS="titulo"> Cambios de sabores:</P>
<BR/><BR/>';
echo'<LABEL FOR="clave">'."Clave:".'</LABEL>';
echo'<INPUT NAME="cveSabor" TYPE="text"
ID="claveSabor" SIZE="100px" MAXLENGHT="6"
VALUE='.$vCveSab.' READONLY="readonly"><BR/>';
echo'<LABEL FOR="nombre">'."Nombre:".'</LABEL>';
echo'<INPUT NAME="nomSabor" TYPE="text"
ID="nombreSabor" SIZE="100"
MAXLENGHT="25 VALUE='.$vNomSab.'><BR/>';
echo'<LABEL FOR="medida">'."Medida:".'</LABEL>';
echo'<SELECT NAME="nombreMedida" ID="nombreMedida">';
$sqlMedidas="SELECT*FROM MEDIDA";
$tablaMedida=mysql_query($sqlMedidas);
for ($i=0; $i<$numfilasMedidas; $i++){
$filaMedida=mysql_fetch_array($tablaMedida);
if($filaMedida['nomMedida']==$vNomMedida){
echo'<OPTION SELECTED="selected">'
.$filaMedida['nomMedida'].'</OPTION>';
}
else
echo'<OPTION>'.$filaMedida['nomMedida'].'</OPTION>';
}
echo'</SELECT><BR/><BR/>';
echo'<INPUT TYPE="button" NAME="boton"
ID="botonModificar" VALUE="Modificar"
ONCLICK="modificar();"/>';
echo'<INPUT TYPE="reset" NAME="botonCancelar"
ID="botonCancelar" VALUE="Cancelar"/><BR/>';
echo'</FORM>';
echo'<IMG SRC=".../imagHeladeria/puesto.png"
WIDTH="60" HEIGHT="40" ONCLICK="histoy.back()"/>';
}
else{
$sqlElimSab="DELETE FROM SABOR WHERE
cveSab='$vCveSab'";
$regEli=mysql_query($sqlElimSab,$resConectar);
if(!$regEli)
echo"<SCRIPT LANGUAGE='Javascript' TYPE='text/Javascript'>
alert('Error al intentar eliminar un sabor')
Javascript:history.back(1)
</SCRIPT>";
else
echo "<SCRIPT LANGUAGE='Javascript' TYPE='text/
Javascript'>
alert('Sabor borrado')
window.location='consultaSabor.php'
</SCRIPT>";
}
?>
</BODY>
</HTML>
