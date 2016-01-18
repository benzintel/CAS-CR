<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('database');
    }
    public function update_news(){
        $data = $this->database->get_data_news_show();

        return $data;
    }
	public function index(){
        $news['news'] = $this->update_news();
		$this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/homepage');
        $this->load->view('fontend/menu_root_footer');
	}

    public function product(){
        $per_pg = 12;    //  12 product : 1page
        $offset=$this->uri->segment(3);
        $sub = $this->input->get('sub');
        $cat = $this->input->get('cat');
        if($sub != ""){
            $row = $this->database->get_row($sub);
        }else if($cat != ""){
            $row = $this->database->get_row_cat($cat);
        }else{
            $row = $this->database->get_row(0);
        }

        $this->load->library('pagination');
        $config['base_url'] = base_url()."index.php/welcome/product/";
        //$config['total_rows'] = $this->database->get_row()-1;   //$row['rows'];
        $config['total_rows'] = $row['rows'];
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['suffix'] = '?sub='.$sub; //  add paramiter to URL
        $config['suffix'] = '?cat='.$cat; //  add paramiter to URL
        $config['per_page'] = $per_pg;
        $config['first_url'] = $config['base_url'].$config['suffix']; // Fix bug $config['suffix'] previous page

        $this->pagination->initialize($config);


        if($sub!=""){
            $data['data'] = $this->database->get_all_product($per_pg,$offset,$sub);
        }else if($cat!=""){
            $data['data'] = $this->database->get_all_product_cat($per_pg,$offset,$cat);
        }else{
            $data['data'] = $this->database->get_all_product($per_pg,$offset,0);
        }
        if($row['rows'] <= 0){
            $data['alert'] = "ไม่พบสินค้าในหมวดนี้";
        }

        $news['news'] = $this->update_news();
        $this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/product',$data);
        $this->load->view('fontend/menu_root_footer');
    }
    public function select_data_detail(){
        $id = $this->uri->segment(3);
        $data['select'] = $this->database->get_data_select($id);
        $news['news'] = $this->update_news();
        $this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/products-detail.php',$data);
        $this->load->view('fontend/menu_root_footer');
    }

    public function about_us(){
        $news['news'] = $this->update_news();
        $this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/about_us');
        $this->load->view('fontend/menu_root_footer');
    }

    public function news(){
        $id = $this->input->get('news');
        $news['news'] = $this->update_news();
        $this->load->view('fontend/menu_root',$news);
        if($id != ''){
            $data['source'] = $this->database->get_data_news($id);
            $this->load->view('fontend/news',$data);
        }else{
            $this->load->view('fontend/news');
        }
        $this->load->view('fontend/menu_root_footer');
    }

    public function contact(){
        $news['news'] = $this->update_news();
        $this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/contacts');
        $this->load->view('fontend/menu_root_footer');
    }
}