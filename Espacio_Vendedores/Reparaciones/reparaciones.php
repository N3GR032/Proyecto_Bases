<?php


include("conexion.php");

$conn=conectar();

session_start();


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="estilos.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>
<body>

<title>Reparaciones</title>

<div class="sidebar">
  <a href="../home.php?"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="../Marcas/marcas.php"><i class="fa fa-fw fa-star "></i> Marcas</a>
  <a href="../Automoviles/reparamoviles.php"><i class="fa fa-fw fa-car "></i> Automoviles</a>
  <a href="../Vendedores/vendedores.php"><i class="fa fa-fw fa-book"></i> Vendedores</a>
  <a href="../Clientes/clientes.php"><i class="fa fa-fw fa-list"></i> Clientes</a>
  <a href="../Ventas/ventas.php"><i class="fa fa-fw fa-tag"></i> Ventas</a>
  <a href="../Expropietario/usador.php"><i class="fa fa-fw fa-user"></i> Ex propietario</a>
  <a href="../Compras/compras.php"><i class="fa fa-fw fa-cart-arrow-down"></i> Compras</a>
  <a href="../Repara/repara.php"><i class="fa fa-fw fa-check-circle"></i> Repara</a>
  <a href="reparaciones.php"><i class="fa fa-fw fa-wrench"></i> Reparaciones</a>
  <a href="../Revisiones/revisiones.php"><i class="fa fa-fw fa-check"></i> Revisiones</a>
</div>


 <center>
	 <th></th>
	 <th></th>


 <div class="main" class="container" style="background-color:#f1f1f1">
	<a href="agregar_repara.php"><button type="text" class="agregar">Agregar</button></a>

<table>
	
		<tr>
				<th style="width: 100%">

		
					<form  id="form2" name="form2" method="POST" action="reparaciones.php">
					
					<h3 align="left" >reparacion a buscar</h3>
					<input type="text" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
					<input type="submit"  value="Ver"> 
					</form>


					<?php 

						if(is_numeric( $_POST["buscar"])==false)
							{
									$query = "SELECT * FROM reparaciones WHERE reparacion_repara LIKE '%".$_POST["buscar"]."%'  "; 
							}
							else{
									$bus=(int)  $_POST["buscar"];
									$query = "SELECT * FROM reparaciones WHERE cod_repara=$bus";
							}
							$consulta = pg_query($conn, $query);
							$numeroSql = pg_num_rows($consulta);

				?>

					<p style="font-weight: bold; color:green;"><?php echo $numeroSql; ?> Resultados encontrados</p>

			
					<table>
					<thead>
						<tr style="background-color:#127EC8">
							<th><h2>Codigo Reparacion</h2></th>
							<th><h2>Precio</h2></th>
							<th><h2>Reparacion</h2></th>
							<th><h3>Editar</h3></th>
							<th><h3>Eliminar</h3></th>
							
						</tr>
					</thead>

					
					<tbody>
					<?php while($row = pg_fetch_array($consulta)){
						?>
						<tr>
							<th><input type="text" value = "<?php echo $row['cod_repara'] ?>" readonly></th>
							<th><input type="text" value = "<?php echo $row['precio_repara'] ?>"readonly></th>
							<th><input type="text" value = "<?php echo $row['reparacion_repara'] ?>" readonly></th>
							<th><a href="actualizar_repara.php?cod_repara=<?php echo $row['cod_repara'] ?>"><button type="submit">Editar</button></a></th>
							<th><a href="eliminar_repara.php?cod_repara=<?php echo $row['cod_repara'] ?>"><button type="button" class="cancelbtn">Eliminar</button></a></th>

						</tr>
						
						<?php 
							}
						 ?>


					</tbody>
				</table>
				
			</th>
		</tr>
	</table>
	</center>
						</div>
</body>
</html>