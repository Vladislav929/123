<?php
require_once __DIR__ . '/../models/UserModel.php';

class AuthController {
    private $model;
    
    public function __construct() {
        $this->model = new UserModel();
    }
    
    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->model->login($_POST['email'], $_POST['password']);
            
            if($user) {
                $this->createUserSession($user);
                header('Location: /meubelny-salon/admin');
            } else {
                $data = [
                    'email' => $_POST['email'],
                    'password_error' => 'Неверный email или пароль'
                ];
                
                require_once __DIR__ . '/../views/auth/login.php';
            }
        } else {
            require_once __DIR__ . '/../views/auth/login.php';
        }
    }
    
    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'role' => 'user'
            ];
            
            if($this->model->findUserByEmail($data['email'])) {
                $data['email_error'] = 'Email уже используется';
            }
            
            if(empty($data['email_error'])) {
                if($this->model->addUser($data)) {
                    header('Location: /meubelny-salon/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                require_once __DIR__ . '/../views/auth/register.php';
            }
        } else {
            require_once __DIR__ . '/../views/auth/register.php';
        }
    }
    
    private function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['user_role'] = $user->role;
    }
    
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_role']);
        session_destroy();
        header('Location: /meubelny-salon/login');
    }
}
?>
