<?php

namespace Classes;

Class Template {

    private $registry;

    private $vars = array();

    function __construct($registry) {

            $this->registry = $registry;
    }

    function set($varname, $value, $overwrite=false) {

        if (isset($this->vars[$varname]) == true AND $overwrite == false) {

            trigger_error ('Unable to set var `' . $varname . '`. Already set, and overwrite not allowed.', E_USER_NOTICE);

            return false;
        }

        $this->vars[$varname] = $value;

        return true;
    }

    function remove($varname) {

        unset($this->vars[$varname]);

        return true;
    }

    function show() {
        $file = 'index';
        if(isset($_GET['route']))
            $file = $_GET['route'];

        //include site_path."views".DIRSEP.str_replace("/","\\",$file).".php";
        include site_path."views".DIRSEP."layouts".DIRSEP."app.php";
    }
    function style($name){
      return "../../stylesheet/".$name;
    }
    function js($name){
      return "../../javascript/".$name;
    }
}


?>
