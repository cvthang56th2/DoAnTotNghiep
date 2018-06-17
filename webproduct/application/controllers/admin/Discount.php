<?php 
Class Discount extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
    }

    function index() {
        $input = array();
        $where = array();
        $where['date_discount >='] = now();
        $input['where'] = $where;

        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;

        
         //Buoc 1:load thu vien phan trang
         $this->load->library('pagination');
         //Buoc 2:Cau hinh cho phan trang
         //lay tong so luong đơn hàng tu trong csdl
         $config = array();
         $config['base_url']    = base_url('admin/order/index');
         $config['total_rows']  = $total_rows;
         $config['per_page']    = 10;
         $config['uri_segment'] = 4;//phân đoạn 4
         $config['next_link']   = "Trang kế tiếp";
         $config['prev_link']   = "Trang trước";
         //Khoi tao phan trang
         $this->pagination->initialize($config);
         
         $input['limit'] = array($config['per_page'], $this->uri->rsegment(3));
      //lay toan bo giao dịch
      $list = array();
      $list = $this->product_model->get_list($input);
      
      $this->data['list']   = $list;
        
        $this->data['temp'] = 'admin/discount/index';
        $this->load->view('admin/main', $this->data);
    }
}