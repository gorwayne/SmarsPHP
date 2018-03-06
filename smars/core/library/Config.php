<?php

namespace Smars\Core\Library;

class Config {
    //TODO 加载app目录下的配置文件，覆盖系统默认的配置内容

    static public $configCache = array();

    static public function get($key, $default = null) {

        $keyArray = explode('.', $key);

        $file = $keyArray[0];
        $name = $keyArray[1];

        $configFile = CORE.'/config/'.$file.'.php';
        if(is_file($configFile)) {
            $conf = include $configFile;
            if(isset($conf[$name])) {
                self::$configCache['$file'] = $conf;
                return $conf[$name];
            } else {
                return $default;
            }
        } else {
            throw new \Exception('找不到配置文件'.$file);
        }
    }
}