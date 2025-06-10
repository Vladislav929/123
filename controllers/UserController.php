<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    private $model;
    
    public function __construct() {
        $this->model = new UserModel();
    }
    
    public function listUsers() {
        $users = $this->model->getAllUsers();
        require_once __DIR__ . '/../views/admin/users/list.php';
    }
    
    public function addUser() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'role' => trim($_POST['role'])
            ];
            
            if($this->model->addUser($data)) {
                header('Location: /meubelny-salon/admin/users');
            } else {
                die('Something went wrong');
            }
        } else {
            require_once __DIR__ . '/../views/admin/users/add.php';
        }
    }
    // В controllers/UserController.php
    public function editUser() {
        if(!isset($_GET['id'])) {
            header('Location: /meubelny-salon/admin/users');
            exit();
        }
    
        $userModel = new UserModel();
            $user = $userModel->getUserById($_GET['id']);
        
        if(!$user) {
            header('Location: /meubelny-salon/admin/users');
            exit();
        }
    
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_POST['id'],
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'role' => trim($_POST['role'])
            ];
            
            if($userModel->updateUser($data)) {
                header('Location: /meubelny-salon/admin/users');
                exit();
            } else {
                die('Ошибка при обновлении пользователя');
            }
        }
        
        require_once __DIR__ . '/../views/admin/users/edit.php';
    }
}
?>
