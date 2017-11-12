<?php

namespace Model;

abstract class Model
{
    public function getId()
    {
        return $this->id;
    }
    public static function find($id)
    {
        // factory
        //return $model;
        $p = new Product(); 
        return $p;
    }
    public function save()
    {

    }
}

?>