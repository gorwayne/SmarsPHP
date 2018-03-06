<?php

namespace App\Controllers;

use Smars\Core\Library\Config;
use Smars\Core\Library\Controller;

class IndexController extends Controller {

    public function index() {
        dd(Config::get('smars.app_name'));
    }
}