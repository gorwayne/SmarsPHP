<?php

namespace Smars\Core\Library;

class Route {

    public $controller;
    public $action;

    public function __construct() {

        $routeType = Config::get('smars.route_type');
        switch ($routeType) {
            case 0:
                $this->analysisPathInfoRoute();
                break;
            case 1:
                $this->analysisRewriteRoute();
                break;
            default:
                $this->analysisPathInfoRoute();
                break;
        }
    }

    private function analysisPathInfoRoute() {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/index.php') {
            $path = $_SERVER['REQUEST_URI'];
            if(strpos('index.php', $path) == 0) {
                $pathArray = explode('/', trim($path));
                unset($pathArray[0], $pathArray[1]);
                if(isset($pathArray[2])) {
                    $this->controller = $pathArray[2];
                    unset($pathArray[2]);
                }
                if(isset($pathArray[3])) {
                    $this->action = $pathArray[3];
                    unset($pathArray[3]);
                } else {
                    $this->action = Config::get('route.default_action');
                }
                //把URL多余部分转换为GET  index/index/id/1
                $pathCount = count($pathArray) + 4;
                $i = 4;
                while($i < $pathCount) {
                    if(isset($pathArray[$i + 1])) {
                        $_GET[$pathArray[$i]] = $pathArray[$i + 1];
                    }
                    $i += 2;
                }
            }
        } else {
            $this->controller = Config::get('route.default_controller');
            $this->action = Config::get('route.default_action');
        }
    }

    private function analysisRewriteRoute() {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/index.php') {
            $path = $_SERVER['REQUEST_URI'];
            $pathArray = explode('/', trim($path));
            unset($pathArray[0]);
            if(isset($pathArray[1])) {
                $this->controller = $pathArray[1];
                unset($pathArray[1]);
            }
            if(isset($pathArray[2])) {
                $this->action = $pathArray[2];
                unset($pathArray[2]);
            } else {
                $this->action = Config::get('route.default_action');
            }
            //把URL多余部分转换为GET  index/index/id/1
            $pathCount = count($pathArray) + 3;
            $i = 3;
            while($i < $pathCount) {
                if(isset($pathArray[$i + 1])) {
                    $_GET[$pathArray[$i]] = $pathArray[$i + 1];
                }
                $i += 2;
            }
        } else {
            $this->controller = Config::get('route.default_controller');
            $this->action = Config::get('route.default_action');
        }
    }
}