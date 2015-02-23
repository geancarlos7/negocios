<?php
$registros = array();


if(isset($_POST["btnUpdate"])){
$registro = array();
$registro["prvid"] = $_POST["txtIdActualizar"];
$registro["prvdsc"] = $_POST["txtDescripcion"];
$registro["prvemail"] = $_POST["txtEmail"];
$registro["prvtel"] = $_POST["txtTelefono"];
$registro["prvcont"] = $_POST["txtContacto"];
$registro["prvdir"] = $_POST["txtDireccion"];
$registro["prvest"] = $_POST["txtEstado"];

//Realizar la conexion con MySQL
$conn = new mysqli("127.0.0.1", "root", "", "nw201501");
if($conn->errno){
die("DB no can: " . $conn->error);
}

//Preparar el Insert Statement
$sqlstr = "UPDATE proveedores  SET prvdsc = '". $registro["prvdsc"] ." ', prvemail = '" . $registro["prvemail"] . "', prvtel = '" . $registro["prvtel"] . "', prvcont = '" . $registro["prvcont"] . "', prvdir = '" . $registro["prvdir"] . "', prvest = '" . $registro["prvest"] . "' WHERE prvid = '" . $registro["prvid"] . "'" ;

//Ejecutar el Insert Statement
$result = $conn->query($sqlstr);
//Obtener el último codigo generado
//Obtener los registros de la tabla

}







if(isset($_POST["btnIns"])){
$registro = array();
$registro["prvid"] = 0;
$registro["prvdsc"] = $_POST["txtDescripcion"];
$registro["prvemail"] = $_POST["txtEmail"];
$registro["prvtel"] = $_POST["txtTelefono"];
$registro["prvcont"] = $_POST["txtContacto"];
$registro["prvdir"] = $_POST["txtDireccion"];
$registro["prvest"] = $_POST["txtEstado"];

//Realizar la conexion con MySQL
$conn = new mysqli("127.0.0.1", "root", "", "nw201501");
if($conn->errno){
die("DB no can: " . $conn->error);
}
//Preparar el Insert Statement
$sqlstr = "INSERT INTO `proveedores` ( `prvdsc`, `prvemail`, `prvtel`, `prvcont`, `prvdir`, `prvest` )";
$sqlstr .= "VALUES ( '". $registro["prvdsc"] ." ' , '" . $registro["prvemail"] . "', '" . $registro["prvtel"] . "', '" . $registro["prvcont"] . "', '" . $registro["prvdir"] . "', '" . $registro["prvest"] . "');";
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
<h1>Proveedores</h1>
<form action="ManteProveedores.php" method="POST">
<label for="txtDescripcion">descripcion</label>
<input type="text" name="txtDescripcion" id="txtDescripcion" />
<br/><br/>
<label for="txtEmail">Email</label>
<input type="text" name="txtEmail" id="txtEmail" />
<br/><br/>
<label for="txtTelefono">Telefono</label>
<input type="text" name="txtTelefono" id="txtTelefono" />
<br/><br/>
<label for="txtContacto">Contacto</label>
<input type="text" name="txtContacto" id="txtContacto" />
<br/><br/>
<label for="txtDireccion">Direccion</label>
<input type="text" name="txtDireccion" id="txtDireccion" />
<br/><br/>


<label for="txtEstado">Estado</label>
<select name="txtEstado" id="txtEstado">
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