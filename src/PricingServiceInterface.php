<?php
interface PricingServiceInterface {
    public function getPrice(int $productId): float;
}