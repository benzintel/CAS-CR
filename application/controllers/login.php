<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('database');

    }

    public function index(){
        $this->load->view('login/index');
    }

    public function doLogin(){
        $user = $this->input->post('user');
        $pass = md5($this->input->post('password'));

        $check = $this->database->checklogin($user,$pass);

        if($check != '') {
            $this->session->set_userdata($check);
            redirect(site_url("backend/root_menu"));
        }
        else {
            $this->session->set_userdata('error','Username , Password ผิด');
            redirect(site_url("login/index"));

        }
    }

}
