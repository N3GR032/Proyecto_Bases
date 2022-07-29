
<?php

require_once("conexion.php");

session_start();

$usuario=$_SESSION['nombre_usuario'];

$error = $_GET['error'];

if ($error == "1") {
	echo '<script language = "javascript">alert("Datos incorrectos");</script>';

}



?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="estilos.css">
<script src="https://kit.fontawesome.com/a076d05399.js" ></script>
</head>
<body>

<title>Venta</title>

<div class="sidebar">
<a href="../home.php?"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="../Marcas/marcas.php"><i class="fa fa-fw fa-star "></i> Marcas</a>
  <a href="../Automoviles/automoviles.php"><i class="fa fa-fw fa-car "></i> Automoviles</a>
  <a href="../Vendedores/vendedores.php"><i class="fa fa-fw fa-book"></i> Vendedores</a>
  <a href="../Clientes/clientes.php"><i class="fa fa-fw fa-list"></i> Clientes</a>
  <a href="ventas.php"><i class="fa fa-fw fa-tag"></i> Ventas</a>
  <a href="../Expropietario/usador.php"><i class="fa fa-fw fa-user"></i> Ex propietario</a>
  <a href="../Compras/compras.php"><i class="fa fa-fw fa-cart-arrow-down"></i> Compras</a>
  <a href="../Repara/repara.php"><i class="fa fa-fw fa-check-circle"></i> Repara</a>
  <a href="../Reparaciones/reparaciones.php"><i class="fa fa-fw fa-wrench"></i> Reparaciones</a>
  <a href="../Revisiones/revisiones.php"><i class="fa fa-fw fa-check"></i> Revisiones</a>
  <a href="../Usuarios/usuarios.php"><i class="fa fa-fw fa-users"></i> Usuarios</a>
</div>

 <center>
<div class="main" class="container" style="background-color:#f1f1f1">
<table>

		<th style = "width: 500px">
				<h1>Agregar Venta: </h1>
				<div>
					
				<a href="ventas.php"><button type="button" class="cancelbtn">Regresar</button></a>
				</div>

					<form action = "insertar_venta.php" method = "POST">
						<input type="number" name="codigo_venta" required min="1" max="2147483647" placeholder="Codigo Venta">
						<br><br>
						<input type="date" name="fecha_venta" placeholder="Fecha de venta">
						<br><br>
						<input type="number" name="precio_venta" min="1" max="2147483647" placeholder="Precio de venta">
						<br><br>
						<input type="number" name="cedula_cli" min="1" max="2147483647" placeholder="Cedula Cliente">
						<br><br>
						<input type="number" name="codigo_vende" min="1" max="2147483647" placeholder="Codigo Vendedor">
						<br><br>
						<input type="text" name="matricula_auto" required maxlength="6" size="6" placeholder="Matricula auto">
						<br><br>
						<button type="submit">Ingresar</button>
					</form>
			</th>
	</table>



</div>
</center>
</body>
</html> 

