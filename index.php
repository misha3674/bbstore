<?php
namespace App;

use PDO;
use Classes\Router as Router;


error_reporting (E_ALL);

define ('DIRSEP', DIRECTORY_SEPARATOR);

$site_path = realpath(dirname(__FILE__) . DIRSEP . '..' . DIRSEP). DIRSEP;

// define ('site_path', '/profiles/s/si/sin/singlepage/bbstore.kl.com.ua/');
define ('site_path', $site_path."mvc\\");

spl_autoload_register(function ($class_name) {
        $filename = $class_name.'.php';
        // $file = site_path. DIRSEP . str_replace('\\', DIRSEP, $filename);
        $file = site_path. DIRSEP . $filename;
        if (file_exists($file) == false) {
            return false;
        }
        include ($file);

});

//$db = new PDO('mysql:host=localhost;port=3308;dbname=mvc', 'root', '');
$db = new PDO('mysql:host=mysql.zzz.com.ua;port=3306;dbname=singlepage', 'bbstore', 'pwdbbstore12PWD');
session_start();
$router = new Router();
$router->setPath(site_path.'Controllers');
$router->delegate();

?>