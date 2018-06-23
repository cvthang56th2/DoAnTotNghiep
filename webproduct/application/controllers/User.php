<?php

Class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    /*
     * Kiểm tra email đã tồn tại chưa
     */

    function check_email() {
        $email = $this->input->post('email');
        $where = array('email' => $email);
        //kiêm tra xem email đã tồn tại chưa
        if ($this->user_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        }
        return true;
    }

    /*
     * Đăng ký thành viên
     */

    function register() {

        $this->load->helper('captcha');

		$vals = array(
			'img_path' => './captcha/',
			'img_url' => base_url().'captcha/',
			'expiration' => 7200,
			'word_lenght' => 8,
			'font_size' => 22
		);

		$cap = create_captcha($vals);
		$this->data['captcha'] = $cap['image'];
		$this->session->set_userdata('captchaWord', $cap['word']);

        //neu dang dang nhap thi chuyen ve trang thong tin thanh vien
        if ($this->session->userdata('user_id_login')) {
            redirect(site_url('user'));
        }

        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email|callback_check_email');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
            // $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_matching_captcha');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl
                $password = $this->input->post('password');
                $password = md5($password);

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/user';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }

                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'password' => $password,
                    'image_link' => $image_link,
                    'created' => now(),
                );
                if ($this->user_model->create($data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Đăng ký thành viên thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm được');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(site_url());
            }
        }

        //hiển thị ra view
        $this->data['temp'] = 'site/user/register';
        $this->load->view('site/layout', $this->data);
    }

    public function matching_captcha($str){
		if(strtolower($str) != strtolower($this->session->userdata('captchaWord'))){
			$this->form_validation->set_message('matching_captcha', '{field} không đúng');
			return false;
		}else{
			return true;
		}
	}

    /*
     * Kiem tra đăng nhập
     */

    function login() {
        //neu dang dang nhap thi chuyen ve trang thong tin thanh vien
        if ($this->session->userdata('user_id_login')) {
            redirect(site_url('user'));
        }

        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                //lay thong tin thanh vien
                $user = $this->_get_user_info();
                //gắn session id của thành viên đã đăng nhập
                $this->session->set_userdata('user_id_login', $user->id);
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Đăng nhập thành công');
                redirect();
            }
        }

        //hiển thị ra view
        $this->data['temp'] = 'site/user/login';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Kiem tra email va password co chinh xac khong
     */

    function check_login() {
        $user = $this->_get_user_info();
        if ($user) {
            return true;
        }
        $this->session->set_flashdata('message_type', 'danger');
        $this->form_validation->set_message(__FUNCTION__, 'Đăng nhập không thành công');
        return false;
    }

    /*
     * Lay thong tin cua thanh vien
     */

    private function _get_user_info() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);

        $where = array('email' => $email, 'password' => $password);
        $user = $this->user_model->get_info_rule($where);
        return $user;
    }

    /*
     * Chinh sua thong tin thanh vien
     */

    function edit() {
        if (!$this->session->userdata('user_id_login')) {
            redirect(site_url('user/login'));
        }
        //lay thong tin cua thanh vien
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if (!$user) {
            redirect();
        }
        $this->data['user'] = $user;


        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {
            $password = $this->input->post('password');

            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            if ($password) {
                $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'Nhập lại mật khẩu', 'matches[password]');
            }

            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required');

            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/user';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }
                //them vao csdl
                $data = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                );

                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                }

                if ($password) {
                    $data['password'] = md5($password);
                }
                if ($this->user_model->update($user_id, $data)) {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Chỉnh sửa thông tin thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thành công');
                }
                //chuyen tới trang danh sách quản trị viên
                redirect(site_url('user'));
            }
        }

        //hiển thị ra view
        $this->data['temp'] = 'site/user/edit';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Thong tin cua thanh vien
     */

    function index() {
        if (!$this->session->userdata('user_id_login')) {
            redirect();
        }
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if (!$user) {
            redirect();
        }
        $this->data['user'] = $user;

        //hiển thị ra view
        $this->data['temp'] = 'site/user/index';
        $this->load->view('site/layout', $this->data);
    }

    function order_history() {
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if (!$user) {
            redirect();
        }
        $this->data['user'] = $user;

        $this->load->model('transaction_model');
        $input = array();
        $input['where'] = array('user_id' => $user_id);
        $user_transaction = $this->transaction_model->get_list($input);
        $this->load->model('order_model');
        $this->load->model('product_model');
        foreach ($user_transaction as $trans) {
            $input['where'] = array('transaction_id' => $trans->id);
            $orders = $this->order_model->get_list($input);
            $trans->orders = $orders;
        }

        $this->data['user_transaction'] = $user_transaction;
        $this->data['temp'] = 'site/user/order_history';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Thuc hien dang xuat
     */

    function logout() {
        if ($this->session->userdata('user_id_login')) {
            $this->session->unset_userdata('user_id_login');
        }
        $this->session->set_flashdata('message', 'Đăng xuất thành công');
        redirect();
    }

}
