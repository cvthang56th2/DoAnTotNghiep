<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		// Tai cac file thanh phan
		$this->load->model('comment_model');
		$this->lang->load('admin/comment');
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
			$val->created = get_date_time($val->created);
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