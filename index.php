<?php
/**
 * Created by PhpStorm.
 * User: gaov
 * Date: 2018/3/6
 * Time: 10:00
 */

define('SMARS', str_replace('\\','/',realpath(dirname(__FILE__).'/')));
define('CORE', SMARS.'/core');
define('APP', SMARS.'/app');
define('MODULE', '\App');

define('DEBUG', true);

include "vendor/autoload.php";

if(DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

//Eloquent ORM
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection(require CORE.'/config/database.php');
$capsule->bootEloquent();

include CORE.'/common/function.php';
include CORE.'/smars.php';

spl_autoload_register('\Core\Smars::load');

\Core\Smars::run();