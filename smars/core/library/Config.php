<?php

namespace Smars\Core\Library;

class Config {
    static public $configCache = array();

    static public function get($key, $default = null) {

        $keyArray = explode('.', $key);

        $file = $keyArray[0];
        $name = $keyArray[1];

        $configFile = CORE.'/config/'.$file.'.php';
        $customConfigFile = APP.'/config/'.$file.'.php';
        if(is_file($configFile)) {
            $conf = include $configFile;
            if(isset($conf[$name])) {
                self::$configCache['$file'] = $conf;
                if(is_file($customConfigFile)) {
                    $customConf = include  $customConfigFile;
                    if(isset($customConf[$name])) {
                        return $customConf[$name];
                    }
                }
                return $conf[$name];
            } else {
                return $default;
            }
        } else {
            throw new \Exception('找不到配置文件['.$file.']');
        }
    }
}