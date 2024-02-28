

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="documento_php.php" method="get">
        <h1>Seccion 2: Invitados de una fiesta</h1>
        <label for = "edad">Edad Persona 1</label>
        <input type="number" name ="persona1" id="edad">
        <br>
        <label for = "edad">Edad Persona 2</label>
        <input type="number" name ="persona2" id="edad">
        <br>
        <label for = "edad">Edad Persona 3</label>
        <input type="number" name ="persona3" id="edad">
        <br>
        <input type="submit" value="Enviar">
    </form>
    <pre>
<?php
//Aqui se carga toda la base de datos - Vsibles en la URL
//Usar con formularios con informacion no sensible
print_r($_GET);
//Aqui se carga unicamente lo que solicito - Visibles en la URL
//print_r($_GET['nombre']);
//print_r($_POST); 
//print_r($_SERVER); //Suministra informacion del servidor
//print_r($_FILES);
//print_r($_GLOBAL)

$edad1 = $_GET['persona1'];
$edad2 = $_GET['persona2'];
$edad3 = $_GET['persona3'];
$promedio = ($edad1+$edad2+$edad3)/3;

?>
</pre>

<h1>El promedio es <?php echo $promedio?></h1>
</body>
</html>
