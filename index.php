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

$registry = new Registry();

$db = new PDO('mysql:host=localhost;port=3308;dbname=mvc', 'root', '');
$router = new Router($registry);
// create template in controller
$template = new Template($registry);

$registry->set('db', $db);
// $registry->set('router', $router);
$registry->set('template', $template);

$router->setPath(site_path . 'controllers');
$router->delegate();
$template->show();

?>