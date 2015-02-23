<?php
$registros = array();
if(isset($_POST["btnUpdate"])){
$registro = array();
$registro["prdid"] = $_POST["txtIdActualizar"];
$registro["prddsc"] = $_POST["txtDescripcion"];
$registro["prdbrc"] = $_POST["txtPrecio"];
$registro["prdctd"] = $_POST["txtCantidad"];
$registro["prdest"] = $_POST["txtEstado"];
$registro["ctgid"] = $_POST["txtIdCat"];

//Realizar la conexion con MySQL
$conn = new mysqli("127.0.0.1", "root", "", "nw201501");
if($conn->errno){
die("DB no can: " . $conn->error);
}

//Preparar el Insert Statement
$sqlstr = "UPDATE productos  SET prddsc = '". $registro["prddsc"] ." ', prdbrc = '" . $registro["prdbrc"] . "', prdctd = '" . $registro["prdctd"] . "', prdest = '" . $registro["prdest"] . "', ctgid = '" . $registro["ctgid"] . "' WHERE prdid = '" . $registro["prdid"] . "'" ;

//Ejecutar el Insert Statement
$result = $conn->query($sqlstr);
//Obtener el último codigo generado
//Obtener los registros de la tabla

}

if(isset($_POST["btnIns"])){
$registro = array();
$registro["prdid"] = 0;
$registro["prddsc"] = $_POST["txtDescripcion"];
$registro["prdbrc"] = $_POST["txtPrecio"];
$registro["prdctd"] = $_POST["txtCantidad"];
$registro["prdest"] = $_POST["txtEstado"];
$registro["ctgid"] = $_POST["txtIdCat"];

//Realizar la conexion con MySQL
$conn = new mysqli("127.0.0.1", "root", "", "nw201501");
if($conn->errno){
die("DB no can: " . $conn->error);
}
//Preparar el Insert Statement
$sqlstr = "INSERT INTO `productos` ( `prddsc`, `prdbrc`, `prdctd`, `prdest`, `ctgid` )";
$sqlstr .= "VALUES ( '". $registro["prddsc"] ." ' , '" . $registro["prdbrc"] . "', '" . $registro["prdctd"] . "', '" . $registro["prdest"] . "', '" . $registro["ctgid"] . "');";
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
<title>Productos</title>
</head>
<body>
<h1>Productos</h1>
<form action="manteProductos.php" method="POST">
<label for="txtDescripcion">descripcion</label>
<input type="text" name="txtDescripcion" id="txtDescripcion" />
<br/><br/>
<label for="txtPrecio">Precio</label>
<input type="text" name="txtPrecio" id="txtPrecio" />
<br/><br/>
<label for="txtCantidad">Cantidad</label>
<input type="text" name="txtCantidad" id="txtCantidad" />
<br/><br/>
<label for="txtEstado">Estado</label>
<input type="text" name="txtEstado" id="txtEstado" />
<br/><br/>

<label for="txtIdCat">Categoria</label>
<select name="txtIdCat" id="txtIdCat">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
<br/><br/>
<input type="submit" name="btnIns" value="Grabar" /><input type="submit" name="btnUpdate" value="Actualizar" />
<label for="txtIdActualizar">Id producto para actualizar:</label>
<input type="text" name="txtIdActualizar" id="txtIdActualizar" />
</form>

</body>
</html>