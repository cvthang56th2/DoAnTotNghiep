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

		//kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if($name)
        {
            $input['like'] = array('user_name', $name);
        }
		$publish = $this->input->get('publish');
		if ($publish != null) {
			$input['where']['publish'] = $publish;
		}

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

	function edit()
    {
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
    
        //lay id danh mục
        $id = $this->uri->rsegment(3);
        $info = $this->comment_model->get_info($id);
        if(!$info)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại bình luận này');
            redirect(admin_url('comment'));
        }
        $this->data['info'] = $info;
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
						//them vao csdl
						$publish = $this->input->post('publish');

						//luu du lieu can them
						$data = array(
								'publish'      => $publish,
						);
						//them moi vao csdl
						if($this->comment_model->update($id, $data))
						{
						//     //tạo ra nội dung thông báo
						    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
						}else{
						    $this->session->set_flashdata('message', 'Không thêm được');
						}
						// //chuyen tới trang danh sách
						redirect(admin_url('comment'));
        }
    
        $this->data['temp'] = 'admin/comment/edit';
        $this->load->view('admin/main', $this->data);
    }
	
	function get_list_comment() {
		$input = array();
		$input['where'] = array("seen" => 0);
		$list = $this->comment_model->get_list($input);
		$count = $this->comment_model->get_total($input);
		$this->load->model('product_model');
		foreach ($list as $key => $val) {
			$product = $this->product_model->get_info($val->product_id);
			$list[$key]->product = $product;
		}
		// pre($list);
		$data = array();
		$data['list'] = $list;
		$data['count'] = $count;
		print_r(json_encode($data));
	}

	function update_seen() {
		$comment_id = $this->input->get('comment_id');
		$data['seen'] = 1;
		$where = array('id' => $comment_id);
		$this->comment_model->update_rule($where, $data);
	}
}