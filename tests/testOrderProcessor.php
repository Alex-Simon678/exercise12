<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/PricingServiceInterface.php';
require_once __DIR__ . '/../src/NotificationServiceInterface.php';
require_once __DIR__ . '/../src/OrderProcessor.php';

class TestOrderProcessor extends TestCase {
    
    public function testProcessOrderCalculatesTotalAndSendsConfirmation(): void {
        $pricingStub = $this->createMock(PricingServiceInterface::class);
        $pricingStub->method('getPrice')->willReturn(15.0);

        $notificationMock = $this->createMock(NotificationServiceInterface::class);
        $notificationMock->expects($this->once())
                         ->method('sendConfirmation')
                         ->with(123);

        $processor = new OrderProcessor($pricingStub, $notificationMock);
        
        $total = $processor->processOrder(123, 456, 2);

        $this->assertEquals(30.0, $total);
    }

    public function testProcessOrderReturnsZeroWhenQuantityIsZero(): void {
        $pricingStub = $this->createMock(PricingServiceInterface::class);
        $notificationMock = $this->createMock(NotificationServiceInterface::class);
        
        $notificationMock->expects($this->never())->method('sendConfirmation');

        $processor = new OrderProcessor($pricingStub, $notificationMock);
        
        $total = $processor->processOrder(123, 456, 0);

        $this->assertEquals(0.0, $total);
    }
}