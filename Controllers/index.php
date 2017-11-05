<?php

namespace Controllers;

use Classes\ControllerBase;

Class ControllerIndex extends ControllerBase {

    private function partials($name){
        return file_get_contents(site_path."views".DIRSEP."partials".DIRSEP.$name);
    }
    function index() {
        $content = "";
        $banner = $this->partials("_banner.php");
        $adShop = $this->partials("_advantage.php");
        $popular = $this->partials("_popular.php");
        $advice = $this->partials("_advice.php");
        $adItem = $this->partials("_adItem.php");
        $blockCatalog = $this->partials("_blockCatalog.php");
        $fan = $this->partials("_fan.php");
        $reviews = $this->partials("_reviews.php");
        $gallery = "";//$this->partials("_gallery.php");
        

        $content = $banner.$adShop.$popular.
                    $advice.$adItem.$blockCatalog.
                    $fan.$advice.$reviews.$blockCatalog.$gallery;
        
        $this->registry['content'] = $content;
    }
    function catalog() {
        $this->registry['content'] = "<h1>Catalog</h1>";
    }
    function delivery() {
        $this->registry['content'] = $this->partials("_delivery.php");
    }
    function certification() {
        $this->registry['content'] = $this->partials("_certification.php");
    }
    function migration(){
        include site_path."migration".DIRSEP."index.php";
    }
}

?>