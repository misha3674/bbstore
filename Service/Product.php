<?php

namespace Service;

class Product
{
    private $name = "";
    private $info = "";
    private $price = "";
    private $oldPrice = "";
    private $mainImg = "";
    private $addImg = [];

    public function getName()
    {
        return "Name product";
    }
    public function setName()
    {

    }

    public function getInfo()
    {
        return "Плед з рукавами з ніжного флісу. Ідеальний аксесуар для дому, літньої тераси, відпочинку за містом і літаків, потягів, а також  є чудовим подарунком для друзів і рідних";
    }
    public function setInfo()
    {

    }

    public function getOldPrice()
    {
        return rand(45,123);
    }
    public function setOldPrice()
    {

    }

    public function getPrice()
    {
        return rand(150,233);
    }
    public function setPrice()
    {

    }

    public function popAddImg()
    {
        $img = "offer/tmp/_40.jpg";
        return "<img class='img-fluid' src='".$img."'>";
    }
    public function pushAddImg()
    {

    }

    public function getMainImg()
    {
        $img = "offer/tmp/_16.jpg";
        return "<img class='img-fluid' src='".$img."'>";
    }
    public function setMainImg()
    {

    }
}

?>