<?php

namespace App\Controllers;

use Smars\Core\Library\Config;
use Smars\Core\Library\Controller;

class IndexController extends Controller {

    public function index() {
        $data = 'Hello World';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}