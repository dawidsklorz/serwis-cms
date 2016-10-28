<?php
namespace System;

Class BaseController
{
    protected $session;
    protected $db;
    protected $renderMain = true;

    public function __construct()
    {
        $this->connectWithDatabase();
    }

    public function renderMain($bool)
    {
        $this->renderMain = $bool;
    }

    public function render($view, array $args = [])
    {
        $filename = __DIR__.'/../View/'.$view.'.php';

        extract($args);

        ob_start();
            include $filename;
            $content = ob_get_contents();
        ob_end_clean();

        if($this->renderMain)
        {
            $filename = __DIR__.'/../View/main.php';

            include $filename;
        }
        else
        {
            echo $content;
        }
    }

    public function redirect($controller, $action)
    {
    	header("Location: ?controller=$controller&action=$action");
    }

    public function setSession($session)
    {
        $this->session = $session;
    }

    public function checkLoggedIn()
    {
        if($this->session->get('user_id') == null && $_GET['controller'] != 'User' && $_GET['action'] != 'login')
        {
            $this->redirect('User', 'login');

            return false;
        }
    }

    public function connectWithDatabase()
    {
        $this->db = new Database();
        $this->db->connect();
    }
}
