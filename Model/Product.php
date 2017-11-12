<?php

namespace Model;
use PDO;
use Factory\ProductFactory;

class Product extends Model
{
    private $table = 'products';
    public $id = 0;
    private $name = "";
    private $info = "";
    private $price = "";
    private $oldPrice = "";
    private $mainImg = "";
    private $addImg = [];

    public static function find($id)
    {
        $db = $GLOBALS['db'];
        $query = $db->prepare("SELECT * FROM products where id = :id");
         $query->bindParam(':id', $id, PDO::PARAM_INT);
        if ($query->execute()) {
          $row = $query->fetch();
          $f = new ProductFactory();
          return $f->make($row);          
        } 
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getInfo()
    {
        return $this->info;
    }
    public function setInfo($info)
    {
        $this->info = $info;
    }

    public function getOldPrice()
    {
        return $this->oldPrice;
    }
    public function setOldPrice($price)
    {
        $this->oldPrice = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function popAddImg()
    {
        return "<img class='img-fluid' src='".array_pop($this->addImg)."'>";
    }
    public function pushAddImg($img)
    {
        $this->addImg[] = $img;
    }

    public function getMainImg()
    {
        return "<img class='img-fluid' src='".$this->mainImg."'>";
    }
    public function setMainImg($img)
    {
        $this->mainImg = $img;
    }
}

?>