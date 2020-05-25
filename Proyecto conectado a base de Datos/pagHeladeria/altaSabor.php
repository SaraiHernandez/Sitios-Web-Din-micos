<HTML XMLNS="http://www.w3.org/1999/xhtml">
<HEAD>
<META HTTP-EQUIV="content-Type"CONTENT="text/html;
CHARSET=utf-8"/>
<TITLE> Formulario de altas de sabores </TITLE>
<LINK HREF="../estilos/estiloSabor.css"
REL="stylesheet" TYPE="text/css" />
</HEAD>
<BODY>
<FORM ID="form1"NAME="form1" METHOD="post"
ACTION="actBase.php">
<P CLASS="titulo"> Altas de sabores</P>
</BR> </BR>
<LABEL FOR="clave">Clave:</LABEL>
<INPUT NAME="cveSabor" TYPE="text"
ID="claveSabor" SIZE="100px"
MAXLENGTH="6"/><BR/>
<LABEL FOR="nombre"> Nombre:</LABEL>
<INPUT NAME="nomSabor" TYPE="text"
ID="nombreSabor" SIZE="100"
MAXLENGTH="25/> <BR/>
<LABEL FOR="medida">MEDIDA:</LABEL>
<SELECT NAME="nombreMedida" ID="nombreMedida">
<?php
include"conectar.php";
$resConectar=conecta();
$sqlMedidas="SELECT*FROM MEDIDA";
$tablaMedidas=mysql_query($sqlMedidas);
$numfilasMedidas=mysql_num_rows($tablaMedidas);
for ($i=0; $i<$numfilasMedidas; $i++){
$filaMedida=mysql_fetch_array($tablaMedida);
echo'<OPTION>'.$filaMedida['nomMedida'].'</OPTION>';
}
?>
</SELECT><BR/><BR/>
<INPUT TYPE="submit" NAME="boton"
ID="botonGuardar" VALUE="Guardar"/>
<INPUT TYPE="reset" NAME="botonNuevo"
ID="botonNuevo" VALUE="Nuevo"/> <BR/>
</FORM>
<IMG SRC=../imagHeladeria/puesto.png"
WIDTH="60" HEIGHT="40" ONCLICK="history.back()"/>
</BODY>
</HTML>



