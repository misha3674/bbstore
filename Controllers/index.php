<?php

namespace Controllers;

use Classes\ControllerBase;
use Classes\Template;
use Service\Gallery;
use Service\Slider;

Class ControllerIndex extends ControllerBase {

    public function index() {
        $template = new Template();
        $template->show();
        // $sliderPopular = new Slider();
        // $sliderReviews = new Slider();

        // $g = new Gallery();
        // $gallery = $g->getGallery();

    }
    public function catalog() {
        // var_dump($GLOBALS['db']);
        $template = new Template();
        $template->show();
    }
    public function delivery() {
        $template = new Template();
        $template->show();
    }
    public function certification() {
        $template = new Template();
        $template->show();
    }
    public function migration() {
        include site_path."migration".DIRSEP."index.php";
    }
}

?>