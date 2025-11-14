<?php

namespace App\Services;

use App\Models\Order;

interface PaymentService
{
    /**
     * Procesar el pago de una orden
     * 
     * @param Order $order
     * @param array $paymentData
     * @return array ['success' => bool, 'reference' => string|null, 'message' => string]
     */
    public function processPayment(Order $order, array $paymentData): array;

    /**
     * Verificar el estado de un pago
     * 
     * @param string $paymentReference
     * @return array ['status' => string, 'paid' => bool]
     */
    public function verifyPayment(string $paymentReference): array;
}

