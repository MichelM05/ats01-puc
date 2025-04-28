<?php
require_once 'calculadora.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operacao = $_POST["operacao"];

    $calc = new Calculadora();

    try {
        $resultado = $calc->calcular($num1, $num2, $operacao);
        echo "<p class='resultado'>Resultado: $resultado</p>";
    } catch (Exception $e) {
        echo "<p class='resultado erro'>Erro: " . $e->getMessage() . "</p>";
    }
}
?>

</body>
</html>
