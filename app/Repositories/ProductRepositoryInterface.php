<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    /**
     * Check if products are exist (search by name).
     * 
     * @param array $productsName
     * @return array
     */
    public function checkByName($productsName);

    /**
     * Find products by name.
     * 
     * @param array $productsName
     * @return array
     */
    public function findByName($productsName);
}