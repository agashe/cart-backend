<?php

namespace App\Services;

use App\Models\Product;

class CartService implements CartServiceInterface
{
    /**
     * @var float $vatValue
     * @var float $perGrams
     * @var float $shoesOff
     * @var float $jacktOff
     * @var float $shippOff
     */
    private $vatValue;
    private $perGrams;
    private $shoesOff;
    private $jacktOff;
    private $shippOff;

    /**
     * Cart Service constructor
     */
    public function __construct()
    {
        $this->vatValue = 0.14;
        $this->perGrams = 0.10;
        $this->shoesOff = 0.10;
        $this->jacktOff = 0.50;
        $this->shippOff = 0.10;
    }

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
    public function invoice($products)
    {
        $off      = 0;
        $vat      = 0;
        $subtotal = 0;
        $shipping = 0;
        $discount = [];

        foreach ($products as $product) {
            // shoes discount
            if ($product->type == 'shoes') {
                $off = $product->price * $this->shoesOff;
                $subtotal += $product->price - $off;
                $discount[] = "10% off shoes: -$$off";
            }

            // jacket  discount
            else if ($product->type == 'jacket' && 
                in_array('t-shirt', $products) &&
                in_array('blouse', $products))
            {
                $off = $product->price * $this->jacketOff;
                $subtotal += $product->price - $off;
                $discount[] = "50% off jacket: -$$off";
            }

            // no discount
            else {
                $subtotal += $product->price;
            }

            $shipping += ($product->weight / $this->perGrams) * 
                $product->country->shipping_rate->amount;

            $vat += $product->price * $this->vatValue;
        }

        // discounts
        if (count($products) > 1) {
            $off = $shipping * $this->shippOff;
            $shipping -= $off;
            $discount[] = "10% off shipping: -$$off";
        }

        return [
            'subtotal' => '$'.$subtotal,
            'shipping' => '$'.$shipping,
            'vat' => '$'.$vat,
            'discount' => $discount,
            'total' => '$'.($subtotal + $shipping + $vat),
        ];
    }
}