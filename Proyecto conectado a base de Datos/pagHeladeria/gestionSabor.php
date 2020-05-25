<TITLE> Formulario de gestion de sabores </TITLE>
<LINK HREF="../estilos/estilosSabor.css"
REL="stylesheet" TYPE="text/css"/>
<SCRIPT LANGUAGE="Javascript" TYPE="text/Javascript">
function eliminar()
{
if(confirm('¿Confirma la baja?'))
document.formGestionEsp.submit()
}
</SCRIPT>
</HEAD>
<BODY>
<FORM ID ="formGestionSab" NAME="formGestionSab"
METHOD="post"
ACTION="gestionBase.php" ENCTYPE="multipart/
form_data">
<P CLASS="titulo">Gestion de sabores</P>
<BR/><BR/>
<?php
include"conectar.php";
$vCveSab=$_POST['cveSabo'];
$resConectar=conecta();
$sqlSabo="SELECT cveSab, nomSab, nomMedida
FROM SABOR, MEDIDA
WHERE cveSab='$vCveSab'
AND SABOR.cveMedida=MEDIDA.cveMedida;";
$tablaSabo=mysql_query($sqlSabo);
$numfilasSabo=mysql_num_rows($tablaSabo);
if($numfilasSabo>0){
$filaSabo=mysql_fetch_array($tablaSabo);
echo'<LABEL FOR="clave">'."Clave:".'</LABEL>';
echo'<INPUT NAME="cveSabor" TYPE="text"
ID="claveSabor" READONLY="readonly"
VALUE='.$filaSabo['cveSabo'].'><BR/>';
echo'<LABEL FOR="nombre">'."Nombre:".'</LABEL>';
echo'<INPUT NAME="nomSabor" TYPE="text"
ID="nombreSabor" READONLY="readonly"
VALUE='.$filaSabo['nomSab'].'><BR/>';
echo'<LABEL FOR="medida">'."MEDIDA:".'</LABEL>';
echo'<INPUT NAME="nomMedida" TYPE="text"
ID="nombreMedida" READONLY="readonly"
VALUE='.$filaSabo['nomMedida'].'><BR/>';
}
echo'<INPUT TYPE="button" NAME="botonG"
ID="botonG" VALUE="Eliminar" ONCLICK="eliminar();"/>';
echo'<INPUT TYPE="submit" NAME="botonG"
ID="botonModificar" VALUE="Modificar"/><BR/>';
?>
</FORM>
<BR/>
<IMG SRC="../imagHeladeria/puesto.png"
WIDTH="60" HEIGHT="40" ONCLICK="history.back()"/>
</BODY>
</HTML>
