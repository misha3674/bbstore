<?php

namespace Factory;

use Service\Product;

class ProductFactory
{
    public function makeProduct()
    {
        $p = new Product();
        return $p;
    }
}

?>