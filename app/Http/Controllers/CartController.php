<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartServiceInterface;
use App\Repositories\ProductRepositoryInterface;

class CartController extends Controller
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
     * Create new cart and return its details.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        // validation
        if (!isset($request->products)) {
            return response()->json('Error : Missing parameter products!!', 400);
        }
        
        if (empty($request->products)) {
            return response()->json('Error: Please provide at least one product!', 400);
        }

        if (!is_array($request->products)) {
            return response()->json('Error: Products parameter must be of type array!', 400);
        }

        if (!$this->productRepository->checkByName($request->products)) {
            return response()->json('Error: Some of the products is not exist!', 400);
        }

        // create cart
        $invoice = $this->cartService->invoice(
            $this->productRepository->findByName($request->products)
        );

        // return response
        return response()->json($invoice, 200);
    }
}
