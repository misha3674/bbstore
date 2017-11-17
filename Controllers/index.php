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

        $template->show($data);

    }
    public function catalog() {
        
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->catalogAjax();
            return;
        }

        $template = new Template();
        $data = null;
        $types = [];
        if(isset($_GET['type']))
            $types[] = $_GET['type'];
        $data['products'] = Product::findWhere( ['type' => $types] );
        $template->show($data);
    }
    private function catalogAjax() {
        $template = new Template();
        $data = null;
        $types = json_decode($_GET['data']);
        $data['products'] = Product::findWhere( ['type' => $types] );
        $template->show($data, site_path."views".DIRSEP."catalogAjax.php");
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