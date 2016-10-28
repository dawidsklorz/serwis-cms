<?php
use System\Session;

spl_autoload_register(function($className) {
    include __DIR__.'/'.str_replace('\\', '/', $className).'.php';
});

if(isset($_COOKIE['cookie']))						
{
	$id = $_COOKIE['cookie'];						
}
else 												
{
	$id = uniqid();									
	setcookie("cookie", $id, time() + (86400 * 30), "/");			
}

$s = new Session($id);
$s->start();

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
    	$obj->setSession($s);
        
        if($obj->checkLoggedIn() !== false)
        {
            echo call_user_func([$obj, $actionName]);
        }
    }
}
$s->save();