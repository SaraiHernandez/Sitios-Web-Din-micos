
<HEAD>
<META HTTP-EQUIV="content-Type" CONTENT="text/html;
CHARSET=utf-8"/>
<TITLE> Formulario de consulta de sabores </TITLE>
<LINK HREF="../estilos/estiloSabor.css"
REL="stylesheet" TYPE="text/css"/>
</HEAD>
<BODY>
<FORM ID="form1" NAME="form1" METHOD="post"
ACTION="gestionSabor.php">
<P CLASS="titulo"> Selecciona sabor</P>
<BR/><BR/>
<LABEL FOR="clave>Clave:</LABEL>
<SELECT NAME="cveSabo" ID="cveSabor">
<?php
include"conectar.php";
$resConectar=conecta();
$sqlSabo="SELECT*FROM SABOR";
$tablaSabo=mysql_query($sqlSabo);
$numfilasSabo=mysql_num_rows($tablaSabo);
for ($i=0; $i<$numfilasSabo; $i++){
$filaSabo=mysql_fetch_array($tablaSabo);
echo'<option>'.$filaSabo['cveSab'].</option>';
}
?>
</SELECT><BR/><BR/>
<INPUT TYPE="submit" NAME="btnConsultar"
ID="botonConsultar" VALUE="Consultar"/><BR/><BR/>
</FORM>
<a href=".../index.html"><IMG SRC="../imagHeladeria/puesto.png"
WIDHT="60" HEIGHT="40"/></a>
</BODY>