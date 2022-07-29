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

<title>Marcas</title>

<div class="sidebar">
<a href="../home.php?"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="marcas.php"><i class="fa fa-fw fa-star "></i> Marcas</a>
  <a href="../Automoviles/automoviles.php"><i class="fa fa-fw fa-car "></i> Automoviles</a>
  <a href="../Repara/repara.php"><i class="fa fa-fw fa-check-circle"></i> Repara</a>
  <a href="../Reparaciones/reparaciones.php"><i class="fa fa-fw fa-wrench"></i> Reparaciones</a>
  <a href="../Revisiones/revisiones.php"><i class="fa fa-fw fa-check"></i> Revisiones</a>
</div>

 <center>
	 <th></th>
	 <th></th>

		<div class="main" class="container" style="background-color:#f1f1f1">
		<table>
		
		<tr>
			<th style="width: 100%">

				<form  id="form2" name="form2" method="POST" action="marcas.php">
				
				<h3 align="left" >Marca a buscar</h3>
				<input type="text" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
				<input type="submit"  value="Ver"> 
				</form>

				<table>
					<thead>
						<tr style="background-color:#127EC8">
							<th><h2>Marca</h2></th>	
						</tr>
					</thead>

					
					<tbody>
						<?php 

							$query = "SELECT * FROM marca";
							$consulta = pg_query($conn, $query);
							while($row = pg_fetch_array($consulta)){
						?>
						
						<tr>
							<th><input type="text" value = "<?php echo $row['nombre_marca'] ?>"readonly></th>
							
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