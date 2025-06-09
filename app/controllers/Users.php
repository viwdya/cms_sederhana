<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }
    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'photo' => '',
                'username_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            if(empty($data['username'])) $data['username_err'] = 'Please enter username';
            elseif($this->userModel->findUserByUsername($data['username'])) $data['username_err'] = 'Username is already taken';
            if(empty($data['password'])) $data['password_err'] = 'Please enter password';
            elseif(strlen($data['password']) < 6) $data['password_err'] = 'Password must be at least 6 characters';
            if($data['password'] !== $data['confirm_password']) $data['confirm_password_err'] = 'Passwords do not match';
            // Handle photo upload
            if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                $target_dir = 'public/uploads/';
                $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
                $target_file = $target_dir . $filename;
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                    $data['photo'] = $filename;
                } else {
                    $data['photo'] = '';
                }
            }
            if(empty($data['username_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->userModel->register($data)) {
                    flash('register_success', 'You are registered and can log in');
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            $data = [
                'username' => '', 'password' => '', 'confirm_password' => '',
                'photo' => '', 'username_err' => '', 'password_err' => '', 'confirm_password_err' => ''
            ];
            $this->view('users/register', $data);
        }
    }
    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];
            if(empty($data['username'])) $data['username_err'] = 'Please enter username';
            if(empty($data['password'])) $data['password_err'] = 'Please enter password';
            if(empty($data['username_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                if($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password or username is incorrect';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'username' => '', 'password' => '', 'username_err' => '', 'password_err' => ''
            ];
            $this->view('users/login', $data);
        }
    }
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_username']);
        session_destroy();
        redirect('users/login');
    }
    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_username'] = $user->username;
        $_SESSION['user_photo'] = $user->photo;
        redirect('posts');
    }
} 