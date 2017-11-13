<?php

namespace Factory;

use Model\Product;

class ProductFactory
{
    public function make($data)
    {
        $p = new Product();

        $p->id = $data['id'];
        $p->setName($data['name']);
        $p->setInfo($data['description']);
        $p->setPrice($data['price']);
        $p->setOldPrice($data['oldprice']);
        $p->pushImg(array_reverse(unserialize($data['images'])));

        return $p;
    }
}

?>