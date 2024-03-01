<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números Cubifinitos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul li {
            margin-bottom: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Números Cubifinitos</h1>
        <p>Se dice que un número es cubifinito cuando al elevar todos sus dígitos al cubo y sumarlos el
            resultado o bien es 1 o bien es un número cubifinito.</p>
        <?php
        function esCubifinito($numero)
        {
            $historial = [$numero];

            while ($numero != 1) {
                $digitos = str_split((string)$numero);
                $numero = array_sum(array_map(function ($d) {
                    return pow($d, 3);
                }, $digitos));

                if (in_array($numero, $historial)) {
                    return ["No cubifinito", $historial];
                }

                $historial[] = $numero;
            }

            return ["Cubifinito", $historial];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numero = $_POST["numero"];
            list($resultado, $historial) = esCubifinito($numero);
        ?>
            <p>Transformaciones:</p>
            <ul>
                <?php foreach ($historial as $paso) : ?>
                    <li><?= $paso ?></li>
                <?php endforeach; ?>
            </ul>
            <p style="font-size: 25px; font-weight: 500;">Resultado: <?= $resultado ?></p>
            <a href="">Volver</a>
        <?php
        } else {
        ?>
            <form action="" method="post">
                <label for="numero">Ingrese un número:</label>
                <input type="number" id="numero" name="numero" required>
                <button type="submit">Verificar</button>
            </form>

            <div style="background-color: #fa4343;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            position: absolute;
            margin-top: 30px;">
                <a href="index.php" style="color: #333;">Volver al menu principal</a>
            </div>

        <?php
        }
        ?>
    </div>
</body>

</html>