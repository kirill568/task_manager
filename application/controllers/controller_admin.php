<?php

class Controller_Admin extends Controller
{
	
	function action_index() {
		$this->view->generate('login_view.php', 'template_view.php');
		
	}

	function action_login() {
		if(isset($_POST['login']) && isset($_POST['password'])) {
			$login = $_POST['login'];
			$password =$_POST['password'];

			if($login=="admin" && $password=="123") {
				session_start(); 
				$_SESSION['login_status'] = "access_granted";
				$_SESSION['show_login_status'] = 1;
				header('Location:/');
			} else {
				$data["login_status"] = "access_denied";
			}

		} else {
			$data["login_status"] = "";
		}
		$this->view->generate('login_view.php', 'template_view.php', $data);
	}
	
	function action_logout() {
		session_start();
		session_destroy();
		header('Location:/');
	}

}
