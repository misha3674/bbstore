<?php

namespace Factory;

use Model\Product;

class ProductFactory
{
    public function makeProduct()
    {
        $p = new Product();
        return $p;
    }
}

?>