<?php if (!defined('BASEPATH')) exit('No direct script access allowed');  
 
class News extends MY_Controller
{
   /*
   * Ham khi khoi tao
   */
   public function __construct()
   {
       parent::__construct();
       $this->load->model('news_model');
   }
   
  
   /*
    * Trang dang danh sách bài viết
    */
   public function index()
   {
	   
   	  //load ra thu vien phan trang
		 $this->load->library('pagination');
		 $config = array();
		 $total_news= $this->news_model->get_total();
		 $config['total_rows'] = $total_news; //tong tat ca cac san pham tren website
		 $config['base_url'] = base_url('news/index'); //link hien thi ra danh sach san pham
		 $config['per_page'] = 8; //so luong san pham hien thi tren 1 trang
		 $config['uri_segment'] = 3; //phan doan hien thi ra so trang tren url
		 $config['next_link'] = 'Trang kế tiếp';
		 $config['prev_link'] = 'Trang trước';
		 $config['first_link'] = 'Trang đầu';
		 $config['last_link'] = 'Trang cuối';

		 //khoi tao cac cau hinh phan trang
		 $this->pagination->initialize($config);
 
		 $segment = $this->uri->segment(3);
		 $segment = intval($segment);
 
		 $input = array();
		 $input['limit'] = array($config['per_page'], $segment);
   	  //lay danh sach bai viet trong csdl,moi lan lay limit 3 bai viet
   	  //$this->uri->segment(n): lay ra phan doan thu n tren link url
      $newss = $this->news_model->get_list($input);
      
      $this->data['list'] = $newss;
      
   	  // Hien thi view
	  $this->data['temp'] = 'site/news/list';
	  $this->load->view('site/layout', $this->data);
   }
   
   /*
    * Trang chi tiết bài viết
    */
   public function view()
   {
        // Lay thong tin cua bài viết
        //id của bài viết sẽ nằm ở phân đoạn thứ 3
		$id = $this->uri->rsegment(3);
		$info = $this->news_model->get_info($id);
		if (!$info)
		{
			$this->session->set_flashdata('flash_message', 'Không tồn tại bài viết này');
			redirect();
		}
		$info->_image = base_url('upload/news/'.$info->image_link);
		$this->data['info'] = $info;

        //cap nhat luot xem cho bai viet
        $data = array();
        $data['count_view'] = $info->count_view + 1;
        $this->news_model->update($id, $data);
        
		// Hien thi view
	    $this->data['temp'] = 'site/news/view';
	    $this->load->view('site/layout', $this->data);
   }
   
  
}

