<?php
class OrderProcessor {
    public function __construct(
        private PricingServiceInterface $pricingService,
        private NotificationServiceInterface $notificationService
    ) {}

    public function processOrder(int $orderId, int $productId, int $quantity): float {
        if ($quantity === 0) {
            return 0.0;
        }
        
        $price = $this->pricingService->getPrice($productId);
        $total = $price * $quantity;
        
        $this->notificationService->sendConfirmation($orderId);
        
        return $total;
    }
}