<?php
use \Firebase\JWT\JWT;
require __DIR__ . '/vendor/autoload.php';
include('function.php');

Class User extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    function login() {
        $key = "example_key";
        
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $email = $obj['email'];
        $password = md5($obj['password']);
        
        $where = array('email' => $email, 'password' => $password);
        $user = $this->user_model->get_info_rule($where);
        if ($user) {
            $jwt = getToken($email);
            $array = array('token'=>$jwt, 'user'=>$user);
            print_r(json_encode($array));
        }
        else{
            echo 'SAI_THONG_TIN_DANG_NHAP';
        }

    }

    function check_login() {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $token = $obj['token'];
        $key = "example_key";
        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
            if($decoded->expire < time()){
                echo 'HET_HAN';
            }
            else{
                $jwt = getToken($decoded->email);
                $decoded = JWT::decode($jwt, $key, array('HS256'));
                $email = $decoded->email;

                $where = array('email' => $email);
                
                $user = $this->user_model->get_info_rule($where);
                if($user){
                    $jwt = getToken($email);
                    $array = array('token'=>$jwt, 'user'=>$user);
                    print_r(json_encode($array));
                }
            }
        }
        catch(Exception $e){
            echo 'TOKEN_KHONG_HOP_LE';
        }
    }

    function change_info() {
       
        $key = "example_key";
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $token = $obj['token'];
        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
            if($decoded->expire < time()){
                echo 'HET_HAN';
            }
            else{
                $email = $decoded->email;
                $name = $obj['name'];
                $phone = $obj['phone'];
                $address = $obj['address'];
                $password = $obj['password'];

                $data = array(
                    'name' => $name,
                    'phone' => $phone,
                    'address' => $address
                );

                if ($password != '') {
                    $data['password'] = md5($password);
                }

                $where = array('email' => $email);
                
                $user = $this->user_model->update_rule($where, $data);

                if($user){
                    $user = $this->user_model->get_info_rule($where);
                    print_r(json_encode($user));
                }
                else{
                    echo 'KHONG_THANH_CONG';
                }

            }
        }

        catch(Exception $e){
            echo 'LOI';
        }

    }

    function refresh_token() {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $token = $obj['token'];
        $key = "example_key";

        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
            if($decoded->expire < time()){
                echo 'HET_HAN';
            }
            else{
                $jwt = getToken($decoded->email);
                print_r($jwt);
            }
        }
        catch(Exception $e){
            echo 'TOKEN_KHONG_HOP_LE';
        }
    }

    function order_history() {
        $key = "example_key";
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $token = $obj['token'];

        try{
            $decoded = JWT::decode($token, $key, array('HS256'));
            if($decoded->expire < time()){
                echo 'HET_HAN';
            }
            else{
                $email = $decoded->email;
                $this->load->model('transaction_model');
                $input = array();
                $input['where'] = array('user_email' => $email);
                $input['order'] = array('created', 'desc');
                $bill = $this->transaction_model->get_list($input);
                foreach ($bill as $key => $val) {
                    $val->created = get_date_time($val->created);
                }
                print_r(json_encode($bill));
            }
        }

        catch(Exception $e){
            echo 'LOI';
        }
    }

    function register() {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $name = $obj['name'];
        $email = $obj['email'];
        $password = md5($obj['password']);
        $address = $obj['address'];
        $phone = $obj['phone'];

        if($name !='' && $email != '' && $password!='' && $address != ''){
            
            $checkEmail = $this->check_email();
            
            $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'password' => $password,
                'created' => now(),
            );

            $result = $this->user_model->create($data);
            if($result){
                echo 'THANH_CONG';
            }
            else{
                echo 'KHONG_THANH_CONG';
            }
        }
        else{
            echo 'KHONG_THANH_CONG';
        }
    }

    function check_email() {
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $email = $obj['email'];
        $where = array('email' => $email);
        if ($this->user_model->check_exists($where)) {
            return false;
        }
        return true;
    }
}
