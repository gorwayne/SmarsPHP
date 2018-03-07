<?php

namespace Smars\Core\Library;

use Twig_Environment;
use Twig_Loader_Filesystem;

class Controller {

    public $assign = [];

    public function __construct() {
    }

    public function assign($name, $value) {
        $this->assign[$name] = $value;
    }

    public function display($file) {
        $file = APP.'/views/'.$file;
        if(is_file($file)) {
            $loader = new Twig_Loader_Filesystem(APP.'/views/');
            $twig = new Twig_Environment($loader, array(
                'cache' => APP.'/cache/template_c',
                'debug' => DEBUG
            ));
            $template = $twig->load('index.html');
            $template->display($this->assign?$this->assign:'');
        }
    }
}