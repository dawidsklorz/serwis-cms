<?php
namespace Controller;
use System\BaseController;
use System\Database;
use System\Session;

Class Article extends BaseController
{
	public function addFormAction()
	{
        $this->render('addFormArticle');
	}

    public function editFormAction()
    {
        $tab = array(":id" => $_GET["id"]);
        $article = $this->db->query("SELECT * FROM article WHERE id=:id", $tab);

        if($article[0]['id_user'] == $this->session->get('user_id'))
        {
            $this->render('editFormArticle', [ "article" => $article[0] ]);
        }
        else
            $this->redirect("Homepage", "index");      
    }

    public function addAction()
    {
        $tab = array(":title" => $_POST["title"], ":content" => $_POST["content"], ":introduction" => $_POST["introduction"], ":id_user" => $this->session->get('user_id'));
        $this->db->execute("INSERT INTO article (title, content, introduction, id_user) VALUES (:title, :content, :introduction, :id_user)", $tab);
        $this->redirect("Homepage", "index");
    }

    public function deleteAction()
    {
        $tab = array(":id" => $_GET["id"]);
        $id_user = $this->db->query("SELECT id_user FROM article WHERE id=:id", $tab);

        if($id_user[0]['id_user'] == $this->session->get('user_id'))
        {
            $this->db->execute("DELETE FROM article WHERE ID = (:id)", $tab);
        }
        $this->redirect("Homepage", "index");
    }

    public function editAction()
    {
        $tab = array(":id" => $_POST["id"], ":title" => $_POST["title"], ":content" => $_POST["content"], ":introduction" => $_POST["introduction"]);
        $this->db->execute("UPDATE article SET title=:title, content=:content, introduction=:introduction WHERE id=:id", $tab);
        $this->redirect("Homepage", "index");
    }

    public function changeVisibilityAction()
    {
        $tab = array(":id" => $_POST["id"]);
        $this->db->execute("UPDATE article SET visibility = !visibility WHERE id=:id", $tab);
    }
}
