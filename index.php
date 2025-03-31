<!DOCTYPE html>
<html>
<head>
<style>
    body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
    input, select, button { margin: 5px; padding: 10px; }
</style>
    <title>Calculadora PHP</title>
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
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operacao = $_POST["operacao"];
    $resultado = 0;

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
    }

    echo "<h3>Resultado: $resultado</h3>";
}
?>
