<?php
namespace Controller;
use System\BaseController;
use System\Database;

Class Homepage extends BaseController
{
    public function indexAction()
    {
		$db = new Database();
		$db->connect();
		$article = $db->query("SELECT * FROM article WHERE visibility=1", []);
		$this->render('index', [ "article" => $article ]);   
    }
}
