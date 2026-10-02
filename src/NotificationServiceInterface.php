<?php
interface NotificationServiceInterface {
    public function sendConfirmation(int $orderId): void;
}