<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends MY_Controller {

    /**
     * Ham khoi dong
     */
    function __construct() {
        parent::__construct();

        // Tai cac file thanh phan
        $this->load->helper('language');
        $this->lang->load('admin/order');
        $this->lang->load('admin/transaction');
        $this->load->model('order_model');
        $this->lang->load('admin/common');
    }

    /*
     * ------------------------------------------------------
     *  List handle
     * ------------------------------------------------------
     */

    /**
     * Danh sach
     */
    function index() {
        //tao input dieu kien
        $input = array();
        $where = array();
        //lọc theo id
        $id = $this->input->get('id');
        if ($id) {
            $where['order.id'] = $id;
        }

        //lọc theo thành viên
        $user = $this->input->get('user');
        if ($user) {
            $where['user_id'] = $user;
        }

        //lọc theo trạng thái thanh toán
        $transaction_status = $this->input->get('transaction_status');
        if ($transaction_status != '') {
            $where['transaction.status'] = $transaction_status;
        }

        //lọc theo trạng thái gui hang
        $status = $this->input->get('status');
        if ($status != '') {
            $where['order.status'] = $status;
        }

        //lọc theo thời gian
        $created_to = $this->input->get('created_to');
        $created = $this->input->get('created');
        if ($created && $created_to) {
            //tiem kiem tu ngay A -> B
            $time = get_time_between_day($created, $created_to);
            //nếu dữ liệu trả về hợp lệ
            if (is_array($time)) {
                $where['transaction.created >='] = $time['start'];
                $where['transaction.created <='] = $time['end'];
            }
        }

        //gắn các điệu điện lọc
        $input['where'] = $where;

        //Buoc 1:load thu vien phan trang
        $this->load->library('pagination');
        //Buoc 2:Cau hinh cho phan trang
        //lay tong so luong đơn hàng tu trong csdl
        $total_rows = $this->order_model->get_total($input);
        $config = array();
        $config['base_url'] = base_url('admin/order/index');
        $config['total_rows'] = $total_rows;
        $config['per_page'] = 10;
        $config['uri_segment'] = 4; //phân đoạn 4
        $config['next_link'] = "Trang kế tiếp";
        $config['prev_link'] = "Trang trước";
        //Khoi tao phan trang
        $this->pagination->initialize($config);

        $input['limit'] = array($config['per_page'], $this->uri->rsegment(3));
        //lay toan bo giao dịch
        $list = array();
        $list = $this->order_model->get_list($input);
        foreach ($list as $row) {
            $row->_amount = number_format($row->amount);
            if ($row->status == 0) {
                $row->_status = 'pending';
            } elseif ($row->status == 1) {
                $row->_status = 'completed';
            } elseif ($row->status == 2) {
                $row->_status = 'cancel';
            }
            if ($row->transaction_status == 0) {
                $row->_transaction_status = 'pending';
            } elseif ($row->transaction_status == 1) {
                $row->_transaction_status = 'completed';
            } elseif ($row->transaction_status == 2) {
                $row->_transaction_status = 'cancel';
            }
        }
        $this->data['list'] = $list;
        $this->data['action'] = current_url();
        $this->data['total_rows'] = $total_rows;
        $this->data['filter'] = $input['where'];
        $this->data['created_to'] = $created_to;
        $this->data['created'] = $created;
        // Message
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // Hien thi view
        $this->data['temp'] = 'admin/order/index';
        $this->load->view('admin/main', $this->data);
    }

    function view() {
        //lay id cua giao dịch ma ta muon xoa
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $this->load->model('transaction_model');
        $info = $this->transaction_model->get_info($id);
        if (!$info) {
            return false;
        }
        $info->_amount = number_format($info->amount);
        if ($info->status == 0) {
            $info->_status = 'pending'; //đợi xử lý
        } elseif ($info->status == 1) {
            $info->_status = 'completed'; //hoàn thành
        } elseif ($info->status == 2) {
            $info->_status = 'cancel'; //hủy bỏ
        }
        //lấy danh sách đơn hàng  của giao dịch này
        $this->load->model('order_model');
        $input = array();
        $input['where'] = array('transaction_id' => $id);
        $orders = $this->order_model->get_list($input);
        if (!$orders) {
            return false;
        }
        //load model sản phẩm product_model
        $this->load->model('product_model');
        foreach ($orders as $row) {
            //thông tin sản phẩm
            $product = $this->product_model->get_info($row->product_id);
            $product->image = public_url('upload/product/' . $product->image_link);
            $product->_url_view = site_url('product/view/' . $product->id);

            $row->_price = number_format($product->price);
            $row->_amount = number_format($row->amount);
            $row->product = $product;
            $row->_can_active = true; //có thể thực hiện kích hoạt đơn hàng này hay không
            $row->_can_cancel = TRUE; //có thể hủy đơn hàng hay không

            if ($row->status == 0) {
                $row->_status = 'pending'; //đợi xử lý
            } elseif ($row->status == 1) {
                $row->_status = 'completed'; //Đã giao hàng
                $row->_can_active = false; //không thể kích hoạt
            } elseif ($row->status == 2) {
                $row->_status = 'cancel'; //hủy bỏ
                $row->_can_cancel = false; //không thể kích hoạt
            }
            //link hủy bỏ đơn hàng
            $row->_url_cancel = admin_url('order/cancel/' . $row->id);
            $row->_url_active = admin_url('order/active/' . $row->id); //link kích hoạt đơn hàng
        }

        $this->data['info'] = $info;
        $this->data['orders'] = $orders;
        // Tai file thanh phan
        $this->load->view('admin/order/view', $this->data);
    }

     function active()
    {
        $this->load->model('order_model');
        //lay id cua đơn hàng ma ta muon kích hoạt
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $info = $this->order_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại đơn hàng này');
            redirect(admin_url('order'));
        }
    
        //Cập nhật trạng thái giao hàng
        $data = array();
        $data['status'] = 1;//đã gửi hàng
        $this->order_model->update($id, $data);
    
        //tru di so luong san pham da chuyen cho khach
        //va cong so luong san pham da ban
        $this->load->model('product_model');
        //lay thong san pham trong cai don hang nay
        $product = $this->product_model->get_info($info->product_id);
        $data = array();
        $data['buyed'] = $product->buyed + $info->qty; //cap nhat so luong da mua
        $this->product_model->update($product->id, $data);
        	
        //gui thong bao
        $this->session->set_flashdata('message', 'Đã cập nhật trạng thái đơn hàng thành công');
        redirect(admin_url('order'));
    }
    
    function cancel()
    {
        $this->load->model('transaction_model');
        $this->load->model('order_model');
        //lay id cua đơn hàng ma ta muon hủy
        $id = $this->uri->rsegment('3');
        //lay thong tin cua giao dịch
        $info = $this->order_model->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message', 'Không tồn tại đơn hàng này');
            redirect(admin_url('order'));
        }
    
        $data = array();
        $data['status'] = 2;//Hủy giao dịch
        $this->transaction_model->update($info->transaction_id, $data);
    
        //Cập nhật trạng thái hủy đơn hàng
        $data = array();
        $data['status'] = 2;//Hủy đơn hàng
        $this->order_model->update($id, $data);
    
        //gui thong bao
        $this->session->set_flashdata('message', 'Đã hủy đơn hàng thành công');
        redirect(admin_url('order'));
    }
    
    
    /**
     * Export du lieu ra file excel = cach don gian nhat
     */
    function export() {
        //lay toan bo giao dịch
        $list = $this->order_model->get_list();
        foreach ($list as $row) {
            $row->_amount = number_format($row->amount);
            if ($row->status == 0) {
                $row->_status = 'pending';
            } elseif ($row->status == 1) {
                $row->_status = 'completed';
            } elseif ($row->status == 2) {
                $row->_status = 'cancel';
            }
            if ($row->transaction_status == 0) {
                $row->_transaction_status = 'pending';
            } elseif ($row->transaction_status == 1) {
                $row->_transaction_status = 'completed';
            } elseif ($row->transaction_status == 2) {
                $row->_transaction_status = 'cancel';
            }
        }
        $this->data['list'] = $list;
        $this->load->view('admin/order/export', $this->data);
    }

}
