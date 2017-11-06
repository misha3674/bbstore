<?php
namespace App;

use PDO;
use Classes\Registry as Registry;
use Classes\Router as Router;
use Classes\Template as Template;

error_reporting (E_ALL);

define ('DIRSEP', DIRECTORY_SEPARATOR);

$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP) . DIRSEP;

define ('site_path', $site_path."mvc\\");

spl_autoload_register(function ($class_name) {
        $filename = $class_name.'.php';

        $file = site_path. DIRSEP . $filename;

        if (file_exists($file) == false) {
            return false;
        }
        include ($file);

});

// $registry = new Registry();

$db = new PDO('mysql:host=localhost;port=3308;dbname=mvc', 'root', '');
// $registry->set('db', $db);

$router = new Router();
// $template = new Template();


// $registry->set('router', $router);
// $registry->set('template', $template);

$router->setPath(site_path . 'controllers');
$router->delegate();
// $template->show();
?>