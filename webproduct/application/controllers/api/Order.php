<?php

Class Order extends MY_Controller {

    function index() {
        $this->load->model('product_model');
        
        $json = file_get_contents('php://input');
        $obj = json_decode($json, true);
        $key = "example_key";
        
        $carts = $obj['arrayDetail'];
        $token = $obj['token'];

        $user_id = 0;
        $email = $obj['email'];
        $name = $obj['name'];
        $phone = $obj['phone'];
        $address = $obj['address'];

        $this->load->model('user_model');
        $where = array('email' => $email);
        $user = $this->user_model->get_info_rule($where);

        if ($user)
            $user_id = $user->id;
       
        $total_amount = 0;
        foreach ($carts as $cart) {
            $total_amount = ($cart['product']['discount'] == 0) ? 
            ($cart['product']['price'] * $cart['quantity']) : 
            (($cart['product']['price'] - $cart['product']['discount']) * $cart['quantity']);
        }

        $data = array(
            'status' => 0, //trang thai chua thanh toan
            'user_id' => $user_id, //id thanh vien mua hang neu da dang nhap
            'user_email' => $email,
            'user_name' => $name,
            'user_phone' => $phone,
            'message' => $address, //ghi chú khi mua hàng
            'amount' => $total_amount, //tong so tien can thanh toan
            'payment' => 'offline', //cổng thanh toán,
            'created' => now(),
        );
        
        //them du lieu vao bang transaction
        $this->load->model('transaction_model');
        $transResult = $this->transaction_model->create($data);
        $transaction_id = $this->db->insert_id();

        //them vao bảng order (chi tiết đơn hàng)
        $this->load->model('order_model');
        foreach ($carts as $cart) {
            $subtotal = $cart['product']['discount'] == 0 ? $cart['product']['price'] : $cart['product']['price'] - $cart['product']['discount'];

            $data = array(
                'transaction_id' => $transaction_id,
                'product_id' => $cart['product']['id'],
                'qty' => $cart['quantity'],
                'amount' => $subtotal,
                'status' => '0',
            );
            $this->order_model->create($data);
        }
        if ($transResult)
            echo 'THEM_THANH_CONG';
        else 
            echo 'THEM_THAT_BAI';
    }

    function get_list_order() {
        $this->load->model('order_model');

		$input = array();
		$input['where'] = array("order.status" => 0, "order.seen" => 0);
		$list = $this->order_model->get_list($input);
		$count = $this->order_model->get_total($input);
		$data = array();
		$data['list'] = $list;
		$data['count'] = $count;
		print_r(json_encode($data));
	}

}
