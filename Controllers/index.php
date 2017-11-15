<?php

namespace Controllers;

use Classes\ControllerBase;
use Classes\Template;
use Service\Gallery;
use Service\Slider;
use Model\Product;

Class ControllerIndex extends ControllerBase {

    public function index() {
        $template = new Template();
        $data = null;

        $gallery = new Gallery();
        $data['gallery'] = $gallery;

        $data['products'][] = Product::find(3);
        $data['products'][] = Product::find(5);
        $data['products'][] = Product::find(8);
        $data['products'][] = Product::find(14);


        // $gallery = $g->getGallery();

        $template->show($data);

    }
    public function catalog() {
        
        $template = new Template();
        $data = null;

        // for($i = 1; $i < 33; $i++)
        //     $data['products'][] = Product::find($i);
        // shuffle($data['products']);
        $type = 1;
        if(isset($_GET['type']))
            $type = $_GET['type'];
        $data['products'] = Product::findWhere('type', $type);
        $template->show($data);
    }
    public function delivery() {
        $template = new Template();
        $data = null;
        $template->show($data);
    }
    public function certification() {
        $template = new Template();
        $data = null;
        $template->show($data);
    }
}

?>