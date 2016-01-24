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

        foreach($data['data'] as $key => $val){
            if($val['pro_title']){
                $detail = strip_tags($val['pro_title']);
                if(strlen($detail) >= 150){
                    $d = substr($detail,0,150)."...";
                }else{
                    $d = strip_tags($val['pro_title']);
                }
                $data['data'][$key]['pro_title'] = $d;
            }
            if($val['pro_name']){
                $detail = strip_tags($val['pro_name']);
                if(strlen($detail) >= 50){
                    $d = substr($detail,0,50)."...";
                }else{
                    $d = strip_tags($val['pro_name']);
                }
                $data['data'][$key]['pro_name'] = $d;
            }
        }
//
//        echo "<PRE>";
//        print_r($data);
//        exit;

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
        $news['news'] = $this->update_news();
        foreach($news['news'] as $key => $data){
            $news['news'][$key]['news_detail'] = $this->covert_tag($news['news'][$key]['news_detail']);
            if(strlen(strip_tags($data['news_name'])) > 50){
                $news['news'][$key]['news_name'] = substr(strip_tags($data['news_name']),0,100)."...";
            }else{
                $news['news'][$key]['news_name'] = strip_tags($news['news'][$key]['news_name']);
            }
            if(strlen(strip_tags($data['news_detail'])) > 100){
                $news['news'][$key]['news_detail'] = substr(strip_tags($data['news_detail']),0,100)."...";
            }else{
                $news['news'][$key]['news_detail'] = strip_tags($news['news'][$key]['news_detail']);
            }

        }
        $this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/news');
        $this->load->view('fontend/menu_root_footer');
    }

    public function contact(){
        $news['news'] = $this->update_news();
        $this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/contacts');
        $this->load->view('fontend/menu_root_footer');
    }

    public function news_detail(){
        $id = $this->uri->segment(3);
        $news['news'] = $this->update_news();
        $data['news_data'] = $this->database->select_news_detail($id);
        $data['news_data'][0]['news_detail'] = $this->covert_tag($data['news_data'][0]['news_detail']);
        $this->load->view('fontend/menu_root',$news);
        $this->load->view('fontend/news-detail',$data);
        $this->load->view('fontend/menu_root_footer');
    }

    public function covert_tag($string){
        // Covert htmlspecialchars To tag html
        $from = array('&lt;', '&gt;');
        $to = array('<', '>');
        $new_string = str_replace($from, $to, $string);
        //END Covert htmlspecialchars To tag html

        return $new_string;
    }
}

