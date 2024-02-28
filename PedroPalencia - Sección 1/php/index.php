<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>

<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el campo 'entero' está presente y tiene cuatro dígitos
    if (isset($_POST["entero"]) && preg_match("/^\d{4}$/", $_POST["entero"])) {
        // Obtener el entero ingresado
        $entero_original = intval($_POST["entero"]);

        function cifrar_entero($entero) {
            // Obtener cada dígito del entero
            $digito1 = floor($entero / 1000);
            $digito2 = floor(($entero % 1000) / 100);
            $digito3 = floor(($entero % 100) / 10);
            $digito4 = $entero % 10;
        
            // Sumar 7 a cada dígito y obtener el residuo después de dividir entre 10
            $digito1 = ($digito1 + 7) % 10;
            $digito2 = ($digito2 + 7) % 10;
            $digito3 = ($digito3 + 7) % 10;
            $digito4 = ($digito4 + 7) % 10;
        
            // Intercambiar valores
            $temp = $digito1;
            $digito1 = $digito3;
            $digito3 = $temp;
        
            $temp = $digito2;
            $digito2 = $digito4;
            $digito4 = $temp;
        
            // Construir el entero cifrado
            $entero_cifrado = $digito1 . $digito2 . $digito3 . $digito4;
        
            return strval($entero_cifrado);
        }

        // Realizar el cifrado
        $entero_cifrado = cifrar_entero($entero_original);

        // Mostrar resultados
        echo "<h2>Resultados</h2>";
        echo "<p>Entero original: $entero_original</p>";
        echo "<p>Valor cifrado: $entero_cifrado</p>";
    } else {
        // Mostrar un mensaje de error si el formato no es válido
        echo "<p style='color: red;'>Ingrese un entero de cuatro dígitos válido.</p>";
    }
}
?>

<h2>Ingrese un entero de cuatro dígitos</h2>

<form action="" method="post">
    <label for="entero">Entero de cuatro dígitos:</label>
    <input type="text" name="entero" id="entero" pattern="\d{4}" required>
    <button type="submit">Enviar</button>
</form>

</body>
</html>