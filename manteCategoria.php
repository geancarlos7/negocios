<?php
$registros = array();
if(isset($_POST["btnUpdate"])){
$registro = array();
$registro["ctgid"] = $_POST["txtIdActualizar"];
$registro["ctgdsc"] = $_POST["txtDescripcion"];
$registro["ctgest"] = $_POST["txtStado"];

//Realizar la conexion con MySQL
$conn = new mysqli("127.0.0.1", "root", "", "nw201501");
if($conn->errno){
die("DB no can: " . $conn->error);
}

//Preparar el Insert Statement
$sqlstr = "UPDATE categorias  SET ctgdsc = '". $registro["ctgdsc"] ." ', ctgest = '" . $registro["ctgest"] . "' WHERE ctgid = '" . $registro["ctgid"] . "'" ;

//Ejecutar el Insert Statement
$result = $conn->query($sqlstr);
//Obtener el último codigo generado
//Obtener los registros de la tabla

}


if(isset($_POST["btnIns"])){
$registro = array();
$registro["ctgid"] = 0;
$registro["ctgdsc"] = $_POST["txtDescripcion"];
$registro["ctgest"] = $_POST["txtStado"];

//Realizar la conexion con MySQL
$conn = new mysqli("127.0.0.1", "root", "", "nw201501");
if($conn->errno){
die("DB no can: " . $conn->error);
}
//Preparar el Insert Statement
$sqlstr = "INSERT INTO `categorias` ( `ctgdsc`, `ctgest`)";
$sqlstr .= "VALUES ( '". $registro["ctgdsc"] ." ' , '" . $registro["ctgest"] . "');";
//Ejecutar el Insert Statement
$result = $conn->query($sqlstr);
//Obtener el último codigo generado
//Obtener los registros de la tabla
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Tabla de mantenimiento de estado</title>
</head>
<body>
<h1>Mantenimiento Categoria</h1>
<form action="manteCategoria.php" method="POST">
<label for="txtDescripcion">descripcion</label>
<input type="text" name="txtDescripcion" id="txtDescripcion" />
<br/><br/>

<label for="txtSts">Estado</label>
<select name="txtStado" id="txtStado">
<option value="MBUE">Muy Bueno</option>
<option value="BUE">Bueno</option>
<option value="REG">Regular</option>
<option value="MAL">Malo</option>
</select>
<br/><br/>
<input type="submit" name="btnIns" value="Grabar" /><input type="submit" name="btnUpdate" value="Actualizar" />
<label for="txtIdActualizar">Id producto para actualizar:</label>
<input type="text" name="txtIdActualizar" id="txtIdActualizar" />
</form>

</body>
</html>