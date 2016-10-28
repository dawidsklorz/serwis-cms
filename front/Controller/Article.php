<?php
namespace Controller;
use System\BaseController;
use System\Database;

Class Article extends BaseController
{
    public function showAction()
    {
        $db = new Database();
        $db->connect();
        $tab = array(":id" => $_GET["id"]);
        $article = $db->query("SELECT * FROM article WHERE id=:id AND visibility=1", $tab);
        if($article !== [])
        	$this->render('showArticle', [ "article" => $article[0] ]);  
    	else
        {
            header('HTTP/1.0 404 Not Found');
            $this->render('articleNotFound'); 
        }
    }
}
