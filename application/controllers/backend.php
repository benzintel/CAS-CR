<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class backend extends SecureController {

    function __construct(){
        parent::__construct();
        $this->load->model('database');
    }

    public function add_user(){
        $this->load->view('backend/menu_root');
        $this->load->view('backend/add_user');
        $this->load->view('backend/menu_root_down');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(site_url("login/index"));
    }

    public function root_menu(){
        $this->load->view('backend/menu_root');
        $this->load->view('backend/homepage');
        $this->load->view('backend/menu_root_down');
    }

    public function  add_product(){
        $data['cat'] = $this->database->get_category();
        $this->load->view('backend/menu_root');
        $this->load->view('backend/addproduct',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function pageupload_images(){
        $this->load->view('backend/menu_root');
        $data['image'] = $this->database->getimage_database();
        $this->load->view('backend/muti_upload',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function input_data_add(){
        date_default_timezone_set("Asia/Bangkok");

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-'.htmlspecialchars($this->input->post('pname'));

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('pimage')){		 // Can't upload
            $name = "no_pic.jpg";
        }
        else{ 												// Can upload
            $upload = array('upload_data' => $this->upload->data());
            $name = 	$upload['upload_data']['file_name'];
            //$part =		$_SERVER['DOCUMENT_ROOT']."/upload/";
        }
        if(!$this->upload->do_upload('pdf')){		 // Can't upload
            $name_pdf = "";
        }
        else{ 												// Can upload
            $upload_pdf = array('upload_data' => $this->upload->data());
            $name_pdf = 	$upload_pdf['upload_data']['file_name'];
            //$part =		$_SERVER['DOCUMENT_ROOT']."/upload/";
        }

        $data = array(
            'pro_name'      => htmlspecialchars($this->input->post('pname')),
            'pro_title'     => htmlspecialchars($this->input->post('pdetail')),
            'pro_detail'    => $this->input->post('editor1'),
            'pro_create'    => date("Y-m-d h:i:sa"),
            'pro_show'      => htmlspecialchars($this->input->post('show')),
            'pro_pic'       => $name,
            'cat_id'        => htmlspecialchars($this->input->post('pcat')),
            'sub_id'        => htmlspecialchars($this->input->post('s_pcat')),
            'youtube'       => $this->input->post('youtube'),
            'pdf'           => $name_pdf
        );

        $check = $this->database->insert_product($data);
        if($check == 1){
            $this->session->set_userdata('error','เพิ่มข้อมูลสู่ระบบแล้วค่ะ');
        }else{
            $this->session->set_userdata('error','การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/root_menu"));
    }

    public function get_Pdata(){
        $data['pro'] = $this->database->get_Data_all();
        $this->load->view('backend/menu_root');
        $this->load->view('backend/checkdataAll',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function  delete_Pdata(){
        $id = $this->uri->segment(3);
        $check = $this->database->delete_Pdata($id);
        if($check == 1){
            $this->session->set_userdata('error','ลบข้อมูลในระบบแล้วค่ะ');
        }else{
            $this->session->set_userdata('error','การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/get_Pdata"));
    }

    public function edit_Pdata(){
        $id = $this->uri->segment(3);
        $data['pro'] = $this->database->get_data_select($id);
        $data['cat'] = $this->database->get_category();
        $this->load->view('backend/menu_root');
        $this->load->view('backend/editproduct',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function  save_edit_data(){
        date_default_timezone_set("Asia/Bangkok");
        $id = $this->input->post('id');

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-'.htmlspecialchars($this->input->post('pname'));

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pimage')){		 // Can't upload
            $name = $this->input->post('oldpic');
        }
        else{ 												// Can upload
            if($this->input->post('oldpic') != 'no_pic.jpg') {
                unlink("upload/".$this->input->post('oldpic'));
            }
            $upload = array('upload_data' => $this->upload->data());
            $name = 	$upload['upload_data']['file_name'];
            //$part =		$_SERVER['DOCUMENT_ROOT']."/upload/";
        }
        if (!$this->upload->do_upload('pdf')){		 // Can't upload
            $name = $this->input->post('oldpdf');
        }
        else{ 												// Can upload
            if($this->input->post('oldpdf') != $this->input->post('oldpdf')) {
                unlink("upload/".$this->input->post('oldpdf'));
            }
            $upload_pdf = array('upload_data' => $this->upload->data());
            $name_pdf = 	$upload_pdf['upload_data']['file_name'];
            //$part =		$_SERVER['DOCUMENT_ROOT']."/upload/";
        }

        $data = array(
            'pro_name'      => htmlspecialchars($this->input->post('pname')),
            'pro_title'     => htmlspecialchars($this->input->post('pdetail')),
            'pro_detail'    => $this->input->post('editor1'),
            'pro_show'      => htmlspecialchars($this->input->post('show')),
            'pro_pic'       => $name,
            'cat_id'        => htmlspecialchars($this->input->post('pcat')),
            'sub_id'        => htmlspecialchars($this->input->post('s_pcat')),
            'youtube'       => $this->input->post('youtube'),
            'pdf'           => $name_pdf
        );
        $check = $this->database->update_data_select($id,$data);
        if($check == 1){
            $this->session->set_userdata('error','แก้ไขข้อมูลสู่ระบบแล้วค่ะ');
        }else{
            $this->session->set_userdata('error','การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/root_menu"));
    }

    public function add_news(){
        $this->load->view('backend/menu_root');
        $this->load->view('backend/add_news');
        $this->load->view('backend/menu_root_down');
    }

    public function add_news_save(){
        date_default_timezone_set("Asia/Bangkok");

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-'.htmlspecialchars($this->input->post('pname'));

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pimage')){		 // Can't upload
            $name = "no_pic.jpg";
        }
        else{ 												// Can upload
            $upload = array('upload_data' => $this->upload->data());
            $name = 	$upload['upload_data']['file_name'];
            //$part =		$_SERVER['DOCUMENT_ROOT']."/upload/";
        }

        $data = array(
            'news_name'       => htmlspecialchars($this->input->post('pname')),
            'news_detail'     => htmlspecialchars($this->input->post('editor1')),
            'news_pic'        => $name,
            'news_show'       => $this->input->post('show'),
            'news_youtube'    => $this->input->post('youtube'),
            'news_create'     => date("Y-m-d h:i:sa")
        );

        $check = $this->database->insert_news($data);
        if($check == 1){
            $this->session->set_userdata('error','เพิ่มข้อมูลสู่ระบบแล้วค่ะ');
        }else{
            $this->session->set_userdata('error','การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/root_menu"));
    }

    public function check_news_data(){
        $data['pro'] = $this->database->get_data_news_all();
        $this->load->view('backend/menu_root');
        $this->load->view('backend/checkNews',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function edit_news(){
        $id = $this->uri->segment(3);
        $data['data'] = $this->database->get_data_news($id);
        $this->load->view('backend/menu_root');
        $this->load->view('backend/edit_news',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function edit_newssave(){
        date_default_timezone_set("Asia/Bangkok");
        $id = $this->input->post('id');

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $_SERVER['REQUEST_TIME'].rand().'-'.htmlspecialchars($this->input->post('pname'));

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pimage')){		 // Can't upload
            $name = $this->input->post('oldpic');
        }
        else{ 												// Can upload
            if($this->input->post('oldpic') != 'no_pic.jpg') {
                unlink("upload/".$this->input->post('oldpic'));
            }
            $upload = array('upload_data' => $this->upload->data());
            $name = 	$upload['upload_data']['file_name'];
            //$part =		$_SERVER['DOCUMENT_ROOT']."/upload/";
        }
        $data = array(
            'news_name'       => htmlspecialchars($this->input->post('pname')),
            'news_detail'     => htmlspecialchars($this->input->post('editor1')),
            'news_pic'        => $name,
            'news_show'       => $this->input->post('show'),
            'news_youtube'    => $this->input->post('youtube'),
        );

        $check = $this->database->update_data_news($id,$data);
        if($check == 1){
            $this->session->set_userdata('error','แก้ไขข้อมูลสู่ระบบแล้วค่ะ');
        }else{
            $this->session->set_userdata('error','การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/root_menu"));
    }

    public function delete_data_news(){
        $id = $this->uri->segment(3);
        $check = $this->database->delete_news($id);
        if($check == 1){
            $this->session->set_userdata('error','ลบข้อมูลในระบบแล้วค่ะ');
        }else{
            $this->session->set_userdata('error','การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/check_news_data"));
    }

    public function get_catagory(){
        $id = $this->input->post('name');
        $data['s_cat'] = $this->database->get_subcatagory($id);
        $this->load->view('backend/get_subcatagory',$data);
    }

    public function get_catagory_editpage(){
        $id = $this->input->post('name');
        $data['sub'] = $this->input->post('sub');
        $data['s_cat'] = $this->database->get_subcatagory($id);
        $this->load->view('backend/get_subcatagory',$data);
    }

    public function uploadimage(){
        $files = $_FILES['pimage'];
        $cpt = count($_FILES['pimage']['name']);
        if($cpt > 0){
            for ($i = 0; $i < $cpt; $i++){
                $_FILES['image']['name'] = $files['name'][$i];
                $_FILES['image']['type'] = $files['type'][$i];
                $_FILES['image']['tmp_name'] = $files['tmp_name'][$i];
                $_FILES['image']['error'] = $files['error'][$i];
                $_FILES['image']['size'] = $files['size'][$i];

                $config['upload_path'] = './library_images/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['file_name'] = $_SERVER['REQUEST_TIME'].rand()."-".base64_encode($i);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload("image")) {
                    $error = array('error' => $this->upload->display_errors());
//                    print_r($error);
                    $this->session->set_userdata('error', 'ไม่สามารถอัพโหลดภาพได้ กรุณาลองใหม่อีกครั้ง');
                    redirect(site_url("backend/pageupload_images"));
                }else{
                    $upload = array('upload_data' => $this->upload->data());
                    $data['img_name'] = $upload['upload_data']['file_name'];
                    $this->database->add_image($data);
                }
                if($i == $cpt-1) {
                    redirect(site_url("backend/root_menu"));
                }
            }
        }else{
            redirect(site_url("backend/root_menu"));
        }
    }

    public function delete_images(){
        $id = $this->uri->segment(3);
        $name = $this->database->getimage_database($id);
        if(!empty($name)) {
            unlink("./library_images/" . $name[0]['img_name']);
            $check = $this->database->delete_image($id);
            if ($check == 1) {
                $this->session->set_userdata('error', 'ลบข้อมูลในระบบแล้วค่ะ');
            } else {
                $this->session->set_userdata('error', 'การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
            }
        }

        redirect(site_url("backend/pageupload_images"));
    }

    public function user_add_data(){
        $username = htmlspecialchars($this->input->post('username'));
        $password = md5(htmlspecialchars($this->input->post('password')));
        $name = htmlspecialchars($this->input->post('name'));

        $check_username = $this->database->check_add_user($username);
        if($check_username != 0) {
            $this->session->set_userdata('error', 'ผู้ใช้งานซ้ำกรุณาเปลี่ยนชื่อผู้ใช้งาน');
        }else{
            $data = array(
                'ad_username' => $username,
                'ad_password' => $password,
                'ad_name'     => $name
            );

            $this->database->insert_user($data);
            $this->session->set_userdata('error', 'สร้างบัญชีผู้ใช้งานสำเร็จ');
        }

        redirect(site_url("backend/root_menu"));
    }

    public function get_category(){
        $data['cat'] = $this->database->get_category();
        $this->load->view('backend/menu_root');
        $this->load->view('backend/categoryAll',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function add_category(){
        $this->load->view('backend/menu_root');
        $this->load->view('backend/add_category');
        $this->load->view('backend/menu_root_down');
    }

    public function add_category_save(){
        $data = array(
            'cat_name' => htmlspecialchars($this->input->post('pname')),
            'cat_show' => $this->input->post('show')
        );

        $check = $this->database->insert_data_category($data);
        if ($check == 1) {
            $this->session->set_userdata('error', 'ทำการเพิ่มข่อมูลเรียบร้อยแล้วค่ะ');
        } else {
            $this->session->set_userdata('error', 'การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }

        redirect(site_url("backend/get_category"));
    }

    public function edit_catagory(){
        $id = $this->uri->segment(3);
        $data['cat'] = $this->database->select_data_category($id);
        $this->load->view('backend/menu_root');
        $this->load->view('backend/edit_category',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function edit_catagory_save(){
        $id = $this->input->post('id');
        $data = array(
            'cat_name' => htmlspecialchars($this->input->post('pname')),
            'cat_show' => $this->input->post('show'),
        );
        $check = $this->database->update_data_category($id,$data);
        if ($check == 1) {
            $this->session->set_userdata('error', 'ทำการแก้ไขเรียบร้อยแล้วค่ะ');
        } else {
            $this->session->set_userdata('error', 'การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }

        redirect(site_url("backend/root_menu"));
    }


    public function delete_category(){
        $id = $this->uri->segment(3);
        $check = $this->database->delete_category($id);

        if ($check == 1) {
            $this->session->set_userdata('error', 'ลบข้อมูลในระบบแล้วค่ะ');
        } else {
            $this->session->set_userdata('error', 'การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/get_category"));
    }

    public function get_sub_category(){
        $data['cat'] = $this->database->get_subcategory_all();
        $this->load->view('backend/menu_root');
        $this->load->view('backend/subcatagoryAll',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function add_sub_category(){
        $data['cat'] = $this->database->get_category();
        $this->load->view('backend/menu_root');
        $this->load->view('backend/add_sub_category',$data);
        $this->load->view('backend/menu_root_down');
    }

    public function add_sub_category_save(){
        $data = array(
            'sub_name' => htmlspecialchars($this->input->post('pname')),
            'cat_id'   => $this->input->post('pcat'),
            'sub_show' => $this->input->post('show')
        );

        $check = $this->database->insert_sub_category($data);

        if ($check == 1) {
            $this->session->set_userdata('error', 'ทำการเพิ่มข่อมูลเรียบร้อยแล้วค่ะ');
        } else {
            $this->session->set_userdata('error', 'การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }

        redirect(site_url("backend/get_sub_category"));
    }

    public function edit_sub_category(){
        $id = $this->uri->segment(3);
        $data['cat'] = $this->database->get_category();
        $data['sub'] = $this->database->get_data_subcategory($id);
        $this->load->view('backend/menu_root');
        $this->load->view('backend/edit_sub_category',$data);
        $this->load->view('backend/menu_root_down');

    }

    public function edit_sub_category_save(){
        $id = $this->input->post('id');
        $data = array(
            'sub_name' => htmlspecialchars($this->input->post('pname')),
            'cat_id'   => $this->input->post('pcat'),
            'sub_show' => $this->input->post('show')
        );

        $check = $this->database->update_data_subcategory($id,$data);

        if ($check == 1) {
            $this->session->set_userdata('error', 'ทำการแก้ไขเรียบร้อยแล้วค่ะ');
        } else {
            $this->session->set_userdata('error', 'การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }

        redirect(site_url("backend/get_sub_category"));
    }

    public function delete_sub_category(){
        $id = $this->uri->segment(3);
        $check = $this->database->delete_sub_category($id);

        if ($check == 1) {
            $this->session->set_userdata('error', 'ลบข้อมูลในระบบแล้วค่ะ');
        } else {
            $this->session->set_userdata('error', 'การทำรายการผิดผลาดกรุณาลองใหม่อีกครั้งค่ะ');
        }
        redirect(site_url("backend/get_sub_category"));

    }

    public function remove_pdf(){
        $name = $this->input->post('name');
        $id = $this->input->post('id');
        unlink("upload/".$name);
        echo "ลบไฟล์สำเสร็จ";
        $this->database->update_remove_ajax($id);

    }

}

