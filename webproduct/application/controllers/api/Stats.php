<?php

Class Stats extends MY_Controller {

    function index() {
      echo "hello Stats";
    }

    function get_stats() {
      
        // Tai cac file thanh phan
        $this->load->model('user_model');
        $this->load->model('transaction_model');
        $this->load->model('user_model');
        $this->load->model('news_model');
        $this->load->model('product_model');
        $this->load->model('contact_model');
        $this->load->model('comment_model');
        $list = array();

        //thong ke doanh thu ngay hom nay
        $today = get_date(now());
        $time  = get_time_between($today);
        $where = array(
            'created <=' => $time['end'],
            'created >=' => $time['start'],
            'status' => 1);
        $amount_to_day = $this->transaction_model->get_sum('amount', $where);
        $list['amount_to_day'] = $amount_to_day;
        
        //tong thu theo thang nay
        $thangnay = get_date(now());
        $time     = get_time_between($thangnay, '1');
        $where = array(
            'created <=' => $time['end'],
            'created >=' => $time['start'],
            'status' => 1);
        $tongtien_thang = $this->transaction_model->get_sum('amount', $where);
        $list['tongtien_thang'] = $tongtien_thang;
        
        //lay tong doanh thu
        $where = array('status' => 1);
        $amount_total = $this->transaction_model->get_sum('amount', $where);
        $list['amount_total'] = $amount_total;
        	
        //thống kê tổng số
        $list['total_transaction'] = $this->transaction_model->get_total();
        $list['total_product'] = $this->product_model->get_total();
        $list['total_news']    = $this->news_model->get_total();
        $list['total_user']    = $this->user_model->get_total();
        $list['total_news']    = $this->news_model->get_total();
        $list['total_contact'] = $this->contact_model->get_total();
        $list['total_comment'] = $this->comment_model->get_total();
        
        $data = array();
        $data['list'] = $list;
        print_r(json_encode($data));
    }
}
