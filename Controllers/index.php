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
        // var_dump($GLOBALS['db']);
        $template = new Template();
        $data = null;
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