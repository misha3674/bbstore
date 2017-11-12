<?php

namespace Service;

class Order
{
    public $name  = "";
    public $price = "";
    public $qty   = "";
    public function __construct($n, $p, $q)
    {
        $this->name = $n;
        $this->price = $p;
        $this->qty = $q;
    }
}

?>