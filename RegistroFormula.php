<?php
	$mysqli = new mysqli("localhost","root","Eddymascota22\"","fisica2");


?>
<html>
	<head>
		<title>Agregar Fórmula</title>
		<meta charset="utf-8"/>
	</head>
	<body role="document">
		<h1>Agregar Fórmula</h1>
		<form method="POST">
			<label>Categoría de la Fórmula</label>
			<input type="number" name="cat" placeholder="Categoría...">
			<br>
			<br>
			<label>Nombre de la Fórmula</label>
			<input type="text" name="nom" placeholder="Nombre...">
			<br><br>
			<label>Descripcion de la Fórmula</label>
			<input type="text" name="desc" placeholder="Descripción...">
			<br>
			<br>
			<label>Número de Despejes Posibles</label>
			<input type="number" name="numDesp" placeholder="Número de Despejes...">
			<br><br>
			<input type="submit" name="agregar" value="Agregar Datos">
		</form>
	</body>
</html>
<?php
	if (isset($_POST['agregar'])) {
		$cat = (int)$_POST['cat'];
		$nombre = $_POST['nom'];
		$descripcion = $_POST['desc'];
		$despejes = (int)$_POST['numDesp'];

		$query 
	}
?>