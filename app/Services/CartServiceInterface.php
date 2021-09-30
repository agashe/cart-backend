<?php

namespace App\Services;

interface CartServiceInterface
{
    /**
     * This method return an invoice for a set of products ,
     * the invoice includes:
     * - total
     * - shipping
     * - VAT
     * - discounts
     * 
     * @param array $products
     * @return array
     */
    public function invoice($products);
}