<?php

namespace Controllers;

use Classes\ControllerBase;

Class ControllerProduct extends ControllerBase {

    function index() {

        echo 'Default index of the `members` controllers<br>';

    }

    function show() {
        $this->registry->set('name', 'John');
        $this->registry['template']->show();
    }
}


?>