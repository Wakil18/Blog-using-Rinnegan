<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){
            // Checking if the request is POST or GET
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize POST  data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                // Register the user
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Validating the Data
                if(empty($data['name'])){
                    $data['name_err'] = 'Please Input Name';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please Input Email';
                }else{
                    // Check Email
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is Already Taken';
                    }
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Please Input Password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password need to be more than 6 char';
                }

                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please Type Your Password Again';
                }else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords Do not match';
                    }
                }

                if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    
                    // Hashing Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->userModel->register($data)){
                        flash('register_success', 'Successfully registered, Please Login');
                        redirect('users/login');
                    }else{
                        die('Something went wrong');
                    }

                }else{
                    // Send error to view
                    $this->view('users/register', $data);
                }


            }else{
                // Load Register form
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load View
                $this->view('users/register', $data);
            }
        }


        public function login(){
            // Checking if the request is POST or GET
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitizing data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                if(empty($data['email'])){
                    $data['email_err'] = 'Enter an Email';
                }

                if(empty($data['password'])){
                    $data['password_err'] = 'Enter a Password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Enter a Password larger than 6 characters';
                }
                // elseif(database_password == $data['password'] ){
                //     $data['password_err'] = 'Password does not match with database password';
                // }

                // Checking if mail exists
                if($this->userModel->findUserByEmail($data['email'])){

                }else{
                    $data['email_err'] = 'No User Found';
                }

                if(empty($data['email_err']) && empty($data['password_err'])){
                    // Check and Set Logged in User
                    $LoggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($LoggedInUser){
                        // Create Session
                        $this->createUserSession($LoggedInUser);
                    }else{
                        $data['password_err'] = 'Password Incorrect';

                        $this->view('users/login', $data);
                    }
                }else{
                    $this->view('users/login', $data);
                }

                // Process form

            }else{
                // Init data
                $data = [
                    
                    'email' => '',
                    'password' => '',

                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load View
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;

            redirect('pages/index');
        }

    }
    