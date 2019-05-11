<?php namespace core;
class Bootstrap {
    public static function run() {
        session_start();
        self::parseUrl();
    }
    
    //分析URL生成控制器方法
    public static function parseUrl() {
        //dd('abc');
        //dd($_SERVER);
        if (isset($_GET['s'])) {
            $info = explode('/', $_GET['s']);
            //dd($info);
            $class = "\web\controller\\".ucfirst($info[0]);
            $action = $info[1];
        } else {
            $class = "\web\controller\index";
            $action = "show";
        }
        $obj = new $class;
        echo $obj->$action();
    
    }
}
