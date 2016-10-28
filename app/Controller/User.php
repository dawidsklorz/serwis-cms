<?php
namespace Controller;
use System\BaseController;
use System\Database;
use System\Session;

Class User extends BaseController
{
    public function loginAction()
    {
    	if($this->session->get('user_id') == null)
        {
        	$this->renderMain(false);
            $this->render('login');
        }
        else
        {
        	$this->redirect('Homepage', 'index');
        }
    }

    public function logoutProcessAction()
    {
		$this->session->set("user_id", null);
		$this->redirect('Homepage', "index");
    }

    public function loginProcessAction()
    {
		error_reporting(E_ALL ^ E_NOTICE);
		 
		$email = $_POST['email'];
		$pass  = $_POST['pass'];

		$passH = hash('sha256', $pass);

		$tab = array(':email' => $email, ':password' => $passH);

		$db = new Database();
		$db->connect();
		$user = $db->query("SELECT * FROM user where email=:email AND password=:password", $tab);

		$errors = [];

		if(empty($pass))
		{
		    $errors['pass'] = 'Uzupełnij wszystkie pola formularza';
		}  
		else
	    {
	        if($user===[])
	        {
	            $errors['email'] = 'Błędny adres e-mail lub hasło.';
	            $errors['pass'] = 'Błędny adres e-mail lub hasło.';
	        }
	    } 

		if(empty($email))
		{
		    $errors['email'] = 'Uzupełnij wszystkie pola formularza';
		}
		
		if($user!==[])
		{
		    $this->session->set("user_id", $user[0]["id"]);
		    echo json_encode(array('status' => true, 'message' => 'Za chwilę zostaniesz przekierowany.'));   
		}    
		else
		{
		    if($errors !== [])
		    {
		        echo json_encode(array("status" => false, 'errors' => $errors));
		        exit;
		    }
		}
	}
}
