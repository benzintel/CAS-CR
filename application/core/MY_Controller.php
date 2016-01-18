<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

}

class SecureController extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->preConstruct();
    }

    private function preConstruct(){
        if(!$this->session->userdata('ad_name')){
            $this->session->set_userdata('error','กรุณาเข้าสู่ระบบก่อน');
            redirect(site_url("login/index"));
        }
    }
}

