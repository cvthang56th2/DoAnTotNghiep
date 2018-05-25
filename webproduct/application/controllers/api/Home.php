<?php

Class Home extends MY_Controller {

    function index() {
        $output = array();

        //lay danh sach san pham moi
        $this->load->model('product_model');
        $input = array();
        $input['limit'] = array(6, 0);
        $input['order'] = array('buyed', 'desc');
        $list_product = $this->product_model->get_list($input);


        //lay danh sach san pham deal;
        $input['order'] = array('discount', 'desc');
        $list_product_deal = $this->product_model->get_list($input);

        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalog_list = $this->catalog_model->get_list($input);
        foreach ($catalog_list as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }

        //lay danh sach slide
        $this->load->model('slide_model');
        $slide_list = $this->slide_model->get_list();
        
        $output['slideList'] = $slide_list;
        $output['type'] = $catalog_list;
        $output['product'] = $list_product;
        $output['dealProduct'] = $list_product_deal;

        print_r(json_encode($output));
    }

}
