<?php

namespace Core\Library;

class model extends \PDO {

    public function __construct($dsn, $username, $passwd, $options) {
        parent::__construct($dsn, $username, $passwd, $options);
    }
}
