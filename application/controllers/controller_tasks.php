<?php

class Controller_Tasks extends Controller
{
	function __construct() {
		$this->model = new Model_Tasks();
		$this->view = new View();
	}

	function isAuth() {
		session_start(); 
		if ( $_SESSION['login_status'] == "access_granted" ) {
			return true;
		}
		return false;
	}

	function action_index() {
		$data = array();
		session_start(); 
		if ($this->isAuth()) {
			$data['isAuth'] = true;
		}
		else {
			$data['isAuth'] = false;
		}

		$tasks = $this->model->getAllTasks();
		$data['tasks'] = $tasks;
		$data['login_status'] = $_SESSION['login_status'];
		$this->view->generate('tasks_view.php', 'template_view.php', $data);
	}

	function action_createTask() {
		$formData = array();
		$formData['user'] = htmlspecialchars($_POST['user']);
		$formData['email'] = htmlspecialchars($_POST['email']);
		$formData['body'] = htmlspecialchars($_POST['body']);

		if ($this->model->validate($formData)) {
			session_start(); 
			$_SESSION['formErrors'] = array();
			$this->model->createTask($formData['user'], 
									 $formData['email'], 
									 $formData['body']);
			session_start(); 
			$_SESSION['success_create_task'] = true;
			header("Location:/");
		} else {
			$errors = $this->model->getErrors($formData);
			session_start(); 
			$_SESSION['formErrors'] = $errors;
			header("Location:/");
		}
	}

	function action_updateBody() {
		$id = $_GET['id'];
		$body = $_POST['body'];

		if ($this->isAuth()) {
			$this->model->updateBody($id, $body);
			header("Location:/");
		} else {
			header("Location:/admin/login");
		}		
	}

	function action_updateStatus() {
		$id = $_GET['id'];
		$status = $_POST['status'];
		if ($this->isAuth()) {
			$this->model->updateStatus($id, $status);
			header("Location:/");
		} else {
			header("Location:/admin/login");
		}	
	}
}