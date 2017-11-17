<?php

namespace Controllers;

use Classes\ControllerBase;

class ControllerModal extends ControllerBase
{
    private $path = site_path."views".DIRSEP."modal".DIRSEP;
    public function index(){

    }
    public function filter(){
        echo file_get_contents($this->path."_filter.php");
    }
    public function thanks(){
        echo file_get_contents($this->path."_thanks.php");
    }
    public function basket(){
        echo file_get_contents($this->path."_basket.php");
    }
}

?>