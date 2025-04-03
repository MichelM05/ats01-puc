<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        input, select, button { margin: 5px; padding: 10px; }
        .resultado { font-size: 20px; margin-top: 20px; font-weight: bold; }
        .erro { color: red; }
    </style>
</head>
<body>

    <h2>Calculadora Simples</h2>

    <form method="post">
        <input type="number" name="num1" placeholder="Número 1" required>
        <input type="number" name="num2" placeholder="Número 2" required>
        <select name="operacao">
            <option value="soma">+</option>
            <option value="subtracao">-</option>
            <option value="multiplicacao">×</option>
            <option value="divisao">÷</option>
        </select>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operacao = $_POST["operacao"];
        $resultado = "";

        if (!is_numeric($num1) || !is_numeric($num2)) {
            echo "<p class='resultado erro'>Erro: insira apenas números válidos!</p>";
        } else {
            switch ($operacao) {
                case "soma":
                    $resultado = $num1 + $num2;
                    break;
                case "subtracao":
                    $resultado = $num1 - $num2;
                    break;
                case "multiplicacao":
                    $resultado = $num1 * $num2;
                    break;
                case "divisao":
                    if ($num2 != 0) {
                        $resultado = $num1 / $num2;
                    } else {
                        $resultado = "Erro: divisão por zero!";
                    }
                    break;
                default:
                    $resultado = "Operação inválida!";
            }

            echo "<p class='resultado'>Resultado: $resultado</p>";
        }
    }
    ?>

</body>
</html>
