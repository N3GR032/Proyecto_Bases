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

<title>Revisiones</title>

<div class="sidebar">
<a href="../home.php?"><i class="fa fa-fw fa-home"></i> Home</a>
  <a href="../Marcas/marcas.php"><i class="fa fa-fw fa-star "></i> Marcas</a>
  <a href="../Automoviles/automoviles.php"><i class="fa fa-fw fa-car "></i> Automoviles</a>
  <a href="../Repara/repara.php"><i class="fa fa-fw fa-check-circle"></i> Repara</a>
  <a href="../Reparaciones/reparaciones.php"><i class="fa fa-fw fa-wrench"></i> Reparaciones</a>
  <a href="revisiones.php"><i class="fa fa-fw fa-check"></i> Revisiones</a>
</div>


 <center>
	 <th></th>
	 <th></th>


 <div class="main" class="container" style="background-color:#f1f1f1">
	
<table>
	
		<tr>
				<th style="width: 100%">

		
					<form  id="form2" name="form2" method="POST" action="revisiones.php">
					
					<h3 align="left" >Revisión a buscar</h3>
					<input type="text" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
					<input type="submit"  value="Ver"> 
					</form>


					<?php 

						if(is_numeric( $_POST["buscar"])==false)
							{
									$query = "SELECT * FROM revisiones WHERE detalle LIKE '%".$_POST["buscar"]."%' OR fk_automovil_matricula_auto LIKE '%".$_POST["buscar"]."%' "; 
							}
							else{
									$bus=(int)  $_POST["buscar"];
									$query = "SELECT * FROM revisiones WHERE codigo_revi=$bus"; 
							}
							$consulta = pg_query($conn, $query);
							$numeroSql = pg_num_rows($consulta);

				?>


					<p style="font-weight: bold; color:green;"><?php echo $numeroSql; ?> Resultados encontrados</p>

			
					<table>
					<thead>
						<tr style="background-color:#127EC8">
							<th><h2>Codigo</h2></th>
							<th><h2>Filtro</h2></th>
							<th><h2>Aceite</h2></th>
							<th><h2>Frenos</h2></th>
							<th><h2>Fecha</h2></th>
							<th><h2>Matricula Auto</h2></th>
							<th><h2>Detalle</h2></th>
							
						</tr>
					</thead>

					
					<tbody>
					<?php while($row = pg_fetch_array($consulta)){
						?>
						<tr>
							<th><input type="text" value = "<?php echo $row['codigo_revi'] ?>" readonly></th>
							<th><input type="text" value = "<?php echo $row['filtro'] ?>"readonly></th>
							<th><input type="text" value = "<?php echo $row['aceite'] ?>" readonly></th>
							<th><input type="text" value = "<?php echo $row['frenos'] ?>" readonly></th>
							<th><input type="text" value = "<?php echo $row['fecha_revi'] ?>" readonly></th>
							<th><input type="text" value = "<?php echo $row['fk_automovil_matricula_auto'] ?>" readonly></th>
							<th><input type="text" value = "<?php echo $row['detalle'] ?>" readonly></th>
							
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