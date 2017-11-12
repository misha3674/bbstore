<?php

namespace Controllers;

use Classes\ControllerBase;
use Classes\Template;
use Service\Gallery;
use Service\Slider;
use Factory\ProductFactory;

Class ControllerIndex extends ControllerBase {

    public function index() {
        $template = new Template();
        $data = null;

        $gallery = new Gallery();
        $data['gallery'] = $gallery;

        $f = new ProductFactory();
        $data['products'][] = $f->makeProduct();
        $data['products'][] = $f->makeProduct();
        $data['products'][] = $f->makeProduct();
        $data['products'][] = $f->makeProduct();

        // $sliderPopular = new Slider();
        // $sliderReviews = new Slider();
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
        $template->show();
    }
    public function certification() {
        $template = new Template();
        $data = null;
        $template->show($data);
    }
    public function migration() {
        include site_path."migration".DIRSEP."index.php";
    }
}

?>