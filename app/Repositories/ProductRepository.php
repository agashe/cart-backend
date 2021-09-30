<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Model $model
     */
    private $model;

    /**
     * Product Repository constructor
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * Check if products are exist (search by name).
     * 
     * @param array $productsName
     * @return array
     */
    public function checkByName($productsName)
    {
        foreach ($productsName as $productName) {
            if (!$this->model->where('type', $productName)->exists()) {
                return false;
            }
        }

        return true;
    }

    /**
     * Find products by name.
     * 
     * @param array $productsName
     * @return array
     */
    public function findByName($productsName)
    {
        return $this->model->whereIn('type', $productsName)->get();
    }
}