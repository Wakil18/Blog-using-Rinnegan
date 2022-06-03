<?php
    class Users extends Controller{
        public function __construct(){

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
                    die('Success');
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
                // Process form
                // $_POST = filter_input_array()
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

    }