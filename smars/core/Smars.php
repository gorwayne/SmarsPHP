<?php

namespace Smars\Core;

use Smars\Core\Library\Route;

class Smars {

    public static $classMap = array();

    static public function run() {
        $route = new Route();
        $controllerClass = ucfirst($route->controller);
        $action = $route->action;

        $controllerFile = APP.'/controllers/'.$controllerClass.'Controller.php';
        $controllerClass = MODULE.'\Controllers\\'.$controllerClass.'Controller';

        if(is_file($controllerFile)) {
            include $controllerFile;
            $controller = new $controllerClass();
            $controller->$action();
        } else {
            throw new \Exception('找不到控制器'.$controllerClass);
        }
    }

    static public function load($class) {
        if(isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $classFile = SMARS.'/'.$class.'.php';
            if(is_file($classFile)) {
                include $classFile;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}