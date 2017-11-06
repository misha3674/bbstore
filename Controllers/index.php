<?php

namespace Controllers;

use Classes\ControllerBase;
use Service\Gallery;
use Service\Slider;

Class ControllerIndex extends ControllerBase {

    public function index() {
        // $content = "";
        // $banner = $this->partials("_banner.php");
        // $adShop = $this->partials("_advantage.php");
        // $popular = $this->partials("_popular.php");
        // $advice = $this->partials("_advice.php");
        // $adItem = $this->partials("_adItem.php");
        // $blockCatalog = $this->partials("_blockCatalog.php");
        // $fan = $this->partials("_fan.php");
        // $reviews = $this->partials("_reviews.php");
        
        // $sliderPopular = new Slider();
        // $sliderReviews = new Slider();

        // $g = new Gallery();
        // $gallery = $g->getGallery();

    }
    public function catalog() {
        $this->registry['content'] = "<h1>Catalog</h1>";
    }
    public function delivery() {
        $this->registry['content'] = $this->partials("_delivery.php");
    }
    public function certification() {
        $this->registry['content'] = $this->partials("_certification.php");
    }
    public function migration() {
        include site_path."migration".DIRSEP."index.php";
    }
}

?>