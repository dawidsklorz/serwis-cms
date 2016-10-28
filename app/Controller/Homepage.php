<?php
namespace Controller;
use System\BaseController;

Class Homepage extends BaseController
{
    public function indexAction()
    {
		$tab = array(':UserId' => $this->session->get('user_id'));
	    $allArticles = $this->db->query("SELECT * FROM article WHERE id_user = :UserId", $tab);

	    $this->render('index', array('articles' => $allArticles));
    }
}




