<?php

namespace Core\Library;

class Config {

    //TODO 配置这个地方可以模仿laravel，用[文件名.配置项]来获取配置的值
    //TODO 加载app目录下的配置文件，覆盖系统默认的配置内容

    static public $configCache = array();

    static public function get($name, $file) {
        $configFile = SMARS.'/core/config/'.$file.'.php';
        if(is_file($configFile)) {
            $conf = include $configFile;
            if(isset($conf[$name])) {
                self::$configCache['$file'] = $conf;
                return $conf[$name];
            } else {
                throw new \Exception('找不到配置项'.$file);
            }
        } else {
            throw new \Exception('找不到配置文件'.$file);
        }
    }
}