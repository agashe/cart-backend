<?php

use App\Services\CartServiceInterface;
use App\Repositories\ProductRepositoryInterface;

class CartServiceTest extends TestCase
{
    /**
     * @var CartServiceInterface $cartService 
     * @var ProductRepositoryInterface $productRepository 
     */
    private $cartService;
    private $productRepository;

    /**
     * Cart Controller constructor
     */
    public function __construct(CartServiceInterface $cartService,
        ProductRepositoryInterface $productRepository)
    {
        $this->cartService = $cartService;
        $this->productRepository = $productRepository;
    }

    /**
     * Test invoice creation.
     *
     * @return void
     */
    public function testInvoice()
    {
        $products = ['shoes'];

        $invoice = $this->cartService->invoice(
            $this->productRepository->findByName($products)
        );

        $this->assertEquals($invoice['subtotal'], '$71.991');
        $this->assertEquals($invoice['shipping'], '$26');
        $this->assertEquals($invoice['vat'], '$11.1986');
        $this->assertEquals($invoice['discount'], ["10% off shoes: -$7.999"]);
        $this->assertEquals($invoice['total'], '$109.1896');
    }
}
