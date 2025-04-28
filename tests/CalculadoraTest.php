<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../calculadora.php';

class CalculadoraTest extends TestCase
{
    public function testSoma()
    {
        $calc = new Calculadora();
        $this->assertEquals(5, $calc->calcular(2, 3, 'soma'));
    }

    public function testSubtracao()
    {
        $calc = new Calculadora();
        $this->assertEquals(1, $calc->calcular(3, 2, 'subtracao'));
    }

    public function testMultiplicacao()
    {
        $calc = new Calculadora();
        $this->assertEquals(6, $calc->calcular(2, 3, 'multiplicacao'));
    }

    public function testDivisao()
    {
        $calc = new Calculadora();
        $this->assertEquals(2, $calc->calcular(4, 2, 'divisao'));
    }

    public function testDivisaoPorZero()
    {
        $this->expectException(InvalidArgumentException::class);
        $calc = new Calculadora();
        $calc->calcular(4, 0, 'divisao');
    }
}
