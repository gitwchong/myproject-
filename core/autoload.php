<?php

namespace core;

class autoload
{
    public static $classMap = [];
    public $assign = [];
    static public function run()
    {
        \core\lib\log::init();
        $route = new \core\lib\route();
        $controller = $route->ctrl;
        $action = $route->action;
        $controllerFile = APP.'/Controllers/'.$controller.'Controller.php';
        $controllerClass = '\\'.MODEL.'\Controllers\\'.$controller.'Controller';
        if (is_file($controllerFile)){
            include $controllerFile;
            $newController = new $controllerClass();
            $newController->$action();
            \core\lib\log::log('controller:'.$controller.'  '.'action:'.$action,'controller');
        }else{
            throw new \Exception('找不到控制器'.$controller);
        }
    }

    static public function load($class)
    {
        //自动加载类库
        //new \core\route();
        //$class = new '\core\route';
        //MYPROJECT.'/core/route.php';
        if (isset($classMap[$class])){
            return true;
        }else{
            str_replace('\\','/',$class);
            $field = MYPROJECT.'/'.$class.'.php';
            if (is_file($field)){
                include $field;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }

    public function assign($name,$value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file)
    {
        $file = APP.'/Views/'.$file;
        if (is_file($file)){
            extract($this->assign);//将数组打散，已变量形式

            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/Views');
            $twig = new \Twig_Environment($loader,[
                'cache' => MYPROJECT.'/log/twig',
//                'debug' => DEBUG,
            ]);
            $template = $twig->loadTemplate('index.html');
            $template->display($this->assign ? $this->assign : '');
        }
    }
}