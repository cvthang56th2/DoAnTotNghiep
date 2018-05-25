<?php

Class Product extends MY_Controller {

    function index() {
        $output = array();
        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        //lay danh sach san pham moi
        $this->load->model('product_model');
        $input = array();
        $input['limit'] = array(5, $segment*5);
        $list_product = $this->product_model->get_list($input);

        $output = $list_product;

        print_r(json_encode($output));
    }

     /*
     * Hiển thị danh sách sản phẩm theo danh mục
     */

    function catalog() {
        //lấy ID của thể loại
        $id = intval($this->uri->rsegment(3));
        $output = array();

        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);

        $this->data['catalog'] = $catalog;
        $input = array();

        //kiêm tra xem đây là danh con hay danh mục cha
        if ($catalog->parent_id == 0) {
            $input_catalog = array();
            $input_catalog['where'] = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if (!empty($catalog_subs)) { //neu danh muc hien tai co danh muc con
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub) {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            } else {
                $input['where'] = array('catalog_id' => $id);
            }
        } else {
            $input['where'] = array('catalog_id' => $id);
        }

        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;

        $segment = $this->uri->segment(5);
        $segment = intval($segment);
        $input['limit'] = array(5, $segment*5);

        //lay danh sach san pham
        if (isset($catalog_subs_id)) {
            $this->db->where_in('catalog_id', $catalog_subs_id);
        }
        $list = $this->product_model->get_list($input);
        $output = $list;
        
        print_r(json_encode($output));
    }


    function search() {
        $key = $this->input->get('key-search');
        $this->data['key'] = trim($key);
        $input = array();
        $input['like'] = array('name', $key);
        $list = $this->product_model->get_list($input);
        print_r(json_encode($list));
      
    }
}
