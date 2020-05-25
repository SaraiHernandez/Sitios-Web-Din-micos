<?php 
 $servidor="localhost";
 $usuario="root";
 $clave="";
 $baseDeDatos="formulario";

 $enlace=mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

 if(!$enlace){
 	echo"Error en la conexion con el servidor";
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Formulario De Pedidos</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
    </head>
    <body>
    	<font color="blue">
    	<h1>

    		<link rel="stylesheet" type="text/css" href="Proyecto Heladeria.css">
 <img src="vaquita.png" 
     width="200"
     height="100" " align="left" > <big>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pedidos</big>
</h1>
</p>
	<div class="contenedor">
		<form action="#" class="formulario" id="formulario" name="formulario" method="POST">
			<div class="contenedor-inputs">
				<input type="text" name="nombre" placeholder="Nombre">
				<input type="text" name="direccion" placeholder="Calle">
				<input type="text" name="sabor" placeholder="Sabor">

				
                <br>
				<div class="recargos">
					<input type="checkbox" name="recargos" id="recargos">
					<label for="recargos">Acepto los recargos de costo del envio</label>
				</div> </br>

				<ul class="error" id="error"></ul>
			</div>

			<input type="submit" class="btn" name="pedir" value="Pedir">
		</form>
		<div class="tabla">
			<table>
				<tr>
					<th>Nombre</th>
					<th>Calle</th>
					<th>Sabor</th>
				</tr>
		
					<?php
                    $consulta = "SELECT * FROM pedidos";
                    
                   $ejecutarConsulta = mysqli_query($enlace, $consulta);
						$verFilas = mysqli_num_rows($ejecutarConsulta);
						$fila = mysqli_fetch_array($ejecutarConsulta);

						if(!$ejecutarConsulta){
							echo"Error en la consulta";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
											<td>'.$fila[0].'</td>
											<td>'.$fila[1].'</td>
											<td>'.$fila[2].'</td>
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}

						}
					?>	
						
				
				
			</table>
		</div>
	</div>
	<script src="formulario.js"></script>
</body>
</html>

<?php
	if(isset($_POST['pedir'])){
		$nombre =$_POST["nombre"];
		$direccion=$_POST["direccion"];
		$sabor=$_POST["sabor"];

		$insertarDatos = "INSERT INTO pedidos VALUES('$nombre',
													'$direccion',
													'$sabor')";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

	
	}
?>

<p>
<footer> <h1><center> &#161;&#161;EL HELADO VA EN CAMINO!!<center></h1></footer>
</p>