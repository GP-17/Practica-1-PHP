<?php
// ==========================================
// Ejercicio 1: Serie Fibonacci
// ==========================================
function generarFibonacci($n) {
    $fibonacci = [0, 1];
    if ($n == 1) {
        return [0];
    } elseif ($n == 2) {
        return $fibonacci;
    }

    for ($i = 2; $i < $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    return $fibonacci;
}

// ==========================================
// Ejercicio 2: Número Primo
// ==========================================
function esPrimo($numero) {
    if ($numero <= 1) return false;
    if ($numero == 2) return true;

    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) {
            return false;
        }
    }
    return true;
}

// ==========================================
// Ejercicio 3: Palíndromos
// ==========================================
function esPalindromo($texto) {
    $texto = strtolower(str_replace(' ', '', $texto));
    return $texto === strrev($texto);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicios PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff3e6;
            color: #4a2c2a;
            margin: 0;
            padding-top: 70px;
        }
        h1 {
            text-align: center;
            color: #b3541e;
            margin-top: 20px;
        }
        h2 {
            color: #d2691e;
            border-bottom: 2px solid #d2691e;
            padding-bottom: 5px;
        }
        form {
            margin: 15px 0;
            padding: 15px;
            background-color: #ffe0b2;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="number"], input[type="text"] {
            padding: 8px;
            border: 1px solid #d2691e;
            border-radius: 5px;
            margin-right: 10px;
        }
        button {
            background-color: #ff8c42;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #e67325;
        }
        p {
            background-color: #fff8f0;
            padding: 10px;
            border-left: 4px solid #d2691e;
            border-radius: 5px;
        }
        hr {
            border: 0;
            border-top: 2px dashed #e6b89c;
            margin: 30px 0;
        }
        /* Barra de navegación fija */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #ff8c42;
            padding: 10px;
            z-index: 1000;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Navegación -->
    <nav>
        <a href="#fibonacci">Fibonacci</a>
        <a href="#primos">Primos</a>
        <a href="#palindromos">Palíndromos</a>
    </nav>

    <div class="container">
        <h1>Ejercicios en PHP</h1>

        <!-- Formulario para probar la Serie Fibonacci -->
        <h2 id="fibonacci">1. Serie Fibonacci</h2>
        <form method="post">
            <label>Introduce un número de términos:</label>
            <input type="number" name="fibonacci_n" required>
            <button type="submit">Generar</button>
        </form>
        <?php
        if (isset($_POST['fibonacci_n'])) {
            $n = (int) $_POST['fibonacci_n'];
            $serie = generarFibonacci($n);
            echo "<p><b>Serie con $n términos:</b> " . implode(", ", $serie) . "</p>";
        }
        ?>

        <hr>

        <!-- Formulario para probar si un número es primo -->
        <h2 id="primos">2. Números Primos</h2>
        <form method="post">
            <label>Introduce un número:</label>
            <input type="number" name="primo_num" required>
            <button type="submit">Verificar</button>
        </form>
        <?php
        if (isset($_POST['primo_num'])) {
            $num = (int) $_POST['primo_num'];
            echo "<p><b>Resultado:</b> $num " . (esPrimo($num) ? "es primo ✅" : "no es primo ❌") . "</p>";
        }
        ?>

        <hr>

        <!-- Formulario para probar palíndromos -->
        <h2 id="palindromos">3. Palíndromos</h2>
        <form method="post">
            <label>Introduce una palabra o frase:</label>
            <input type="text" name="palabra" required>
            <button type="submit">Comprobar</button>
        </form>
        <?php
        if (isset($_POST['palabra'])) {
            $texto = $_POST['palabra'];
            echo "<p><b>Resultado:</b> '$texto' " . (esPalindromo($texto) ? "es un palíndromo ✅" : "no es un palíndromo ❌") . "</p>";
        }
        ?>
    </div>

</body>
</html>
