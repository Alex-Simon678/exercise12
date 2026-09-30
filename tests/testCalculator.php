<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/Calculator.php';
class TestCalculator extends TestCase{
    
    public function testAdd() {
        $calculator = new Calculator();
        $a = 5;
        $b = 10;
        $result = $calculator->add($a, $b);
        $this->assertEquals(15, $result);
    }

    public function testSub() {
        $calculator = new Calculator();
        $result = $calculator->sub(10, 4);
        $this->assertEquals(6, $result);
    }

    public function testMultiply() {
        $calculator = new Calculator();
        $result = $calculator->multiply(3, 4);
        $this->assertEquals(12, $result);
    }

    public function testDivision() {
        $calculator = new Calculator();
        $result = $calculator->divide(20, 5);
        $this->assertEquals(4, $result);
    }

    public function testDivisionByZeroThrowsException() {
        $calculator = new Calculator();
        $this->expectException(\InvalidArgumentException::class);
        $calculator->divide(10, 0);
    }
}

