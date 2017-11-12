<?php

namespace Factory;

use Model\Product;

class ProductFactory
{
    public function makeProduct($data)
    {
        $p = new Product();
        return $p->id;
    }
}

?>