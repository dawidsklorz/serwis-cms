<?php
spl_autoload_register(function($className) {
    include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

$controller = 'Homepage';
$action     = 'index';

if(isset($_GET['controller']))
    $controller = $_GET['controller'];
if(isset($_GET['action']))
    $action = $_GET['action'];

$className = 'Controller\\'.$controller;
$actionName = $action.'Action';

if(class_exists($className, true))
{
    $obj = new $className;

    if(method_exists($obj, $actionName))
    {
        echo call_user_func([$obj, $actionName]);
    }
}