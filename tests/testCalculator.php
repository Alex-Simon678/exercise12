<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Depends;
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

    public static function additionProvider(): array {
        return [
            'positive numbers' => [5, 10, 15],
            'negative numbers' => [-5, -10, -15],
            'with zero'        => [0, 5, 5],
            'mixed signs'      => [-5, 10, 5],
            'both zeros'       => [0, 0, 0]
        ];
    }

    #[DataProvider('additionProvider')]
    public function testAddWithDataProvider(int $a, int $b, int $expected): void {
        $calculator = new Calculator();
        $result = $calculator->add($a, $b);
        $this->assertEquals($expected, $result);
    }

    public function testCreateDataStructure(): array {
        $data = ['initial_step' => 'completed'];
        
        $this->assertArrayHasKey('initial_step', $data);
        
        return $data;
    }

    #[Depends('testCreateDataStructure')]
    public function testModifyDataStructure(array $data): array {
        $data['modification_step'] = 'completed';
        $this->assertArrayHasKey('modification_step', $data);
        return $data;
    }

    #[Depends('testModifyDataStructure')]
    public function testVerifyFinalState(array $data): void {
        $this->assertCount(2, $data);
        $this->assertEquals('completed', $data['initial_step']);
        $this->assertEquals('completed', $data['modification_step']);
    }

}

