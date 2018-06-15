<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		// Tai cac file thanh phan
		$this->load->model('comment_model');
		$this->lang->load('admin/comment');
	}
	
	
/*
 * ------------------------------------------------------
 *  Rules params
 * ------------------------------------------------------
 */
	

	/**
	 * Xoa du lieu
	 */
	function del()
	{
	    ///lay thong tin chi tiet cua hỗ trợ muon xóa
		$id = $this->uri->rsegment('3');
		//lay thong tin cua hỗ trợ
		$info = $this->comment_model->get_info($id);
		if(!$info)
		{
		     //gui thong bao that bai
             $this->session->set_flashdata('flash_message', 'Không tồn tại comment này');
             redirect(admin_url('support'));
		}
	    //thuc hien xoa
		if($this->comment_model->delete($id))
		{
		   //gui thong bao that bai
           $this->session->set_flashdata('flash_message', 'Đã xóa bình luận thành công');
		}
		else
		{
		   //gui thong bao that bai
           $this->session->set_flashdata('flash_message', 'Có lỗi trong quá trình xóa');
		}
		redirect(admin_url('comment'));
	}
	
/*
 * ------------------------------------------------------
 *  List handle
 * ------------------------------------------------------
 */
	/**
	 * Danh sach
	 */
	function index()
	{
        $total_rows = $this->comment_model->get_total();
        $this->data['total_rows'] = $total_rows;

        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('comment/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

		//lay danh sach ho tro
		$list = array();
		$list = $this->comment_model->get_list($input);
		$this->data['list'] = $list;
        
        $this->load->model('product_model');

		// Message
		$message = $this->session->flashdata('flash_message');
		if ($message)
		{
			$this->data['message'] = $message;
        }
        foreach($list as $i => $comment) {
            $product = $this->product_model->get_info($comment->product_id);
            $list[$i]->product = $product;
        }
		
		// Hien thi view
		$this->data['temp'] = 'admin/comment/index';
		$this->load->view('admin/main', $this->data);
	}
	
}