<?php
// calculadora.php

class Calculadora
{
    public function calcular($num1, $num2, $operacao)
    {
        if (!is_numeric($num1) || !is_numeric($num2)) {
            throw new InvalidArgumentException('Somente números são permitidos.');
        }

        switch ($operacao) {
            case 'soma':
                return $num1 + $num2;
            case 'subtracao':
                return $num1 - $num2;
            case 'multiplicacao':
                return $num1 * $num2;
            case 'divisao':
                if ($num2 == 0) {
                    throw new InvalidArgumentException('Divisão por zero não é permitida.');
                }
                return $num1 / $num2;
            default:
                throw new InvalidArgumentException('Operação inválida.');
        }
    }
}
