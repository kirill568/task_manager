<?php

class Model_Tasks extends Model {
	public function getAllTasks() {
		$sql = "SELECT * FROM task";
		$tasks = $this->conn->query($sql);
		return $tasks;
	}

	public function createTask($user, $email, $body) {
		$sql = "INSERT INTO task (user, email, body, status) VALUES (?, ?, ?, 0)";
		$sth = $this->conn->prepare($sql);
		$sth->execute(array($user, $email, $body));
	}

	public function updateBody($id, $body) {
		$sql = "UPDATE task SET body = ?, edit_administrator = ? WHERE id = ?";
		$sth = $this->conn->prepare($sql);
		$sth->execute(array($body, 1, $id));
	}

	public function updateStatus($id, $status) {
		$sql = "UPDATE task SET status = ? WHERE id = ?";
		$sth = $this->conn->prepare($sql);
		$sth->execute(array($status, $id));
	}

	public function validate($data) {
		$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
		if (!$email) {
			return false;
		}
		foreach ($data as $key => $value) {
			if (strlen($value) === 0) {
				return false;
			}
		}

		return true;
	}

	public function getErrors($data) {
		$erros = array();
		$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
		if (!$email) {
			$errors[] = 'E-mail введен неверно';
		}
		foreach ($data as $key => $value) {
			if (strlen($value) === 0) {
				$errors[] = 'Поля не должны быть пустыми';
				return $errors;
			}
		}
		return $errors;
	}
}