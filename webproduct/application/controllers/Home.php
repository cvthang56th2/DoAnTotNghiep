<?php

Class Home extends MY_Controller {

    function index() {
        //lay danh sach slide
        $this->load->model('slide_model');
        $slide_list = $this->slide_model->get_list();
        $this->data['slide_list'] = $slide_list;

        //lay danh sach san pham moi
        $this->load->model('product_model');
        $input = array();
        $input['limit'] = array(5, 0);
        

        $input['order'] = array('buyed', 'DESC');
        $product_buy = $this->product_model->get_list($input);
        $this->data['product_buy'] = $product_buy;

        ///lay danh danh sach id 1 (Tivi)
        $id = 1;
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        $input['limit'] = array(5, 0);
        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $id);
            }
        }else{
            $input['where'] = array('catalog_id' => $id);
        }
        $list_tivi = $this->product_model->get_list($input);
        $this->data['list_laptop'] = $list_tivi;
        
        
        //lấy danh sach dien thoai
        $id = 2;
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        $input['limit'] = array(5, 0);
        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $id);
            }
        }else{
            $input['where'] = array('catalog_id' => $id);
        }
        $list_phone = $this->product_model->get_list($input);
        $this->data['list_phone'] = $list_phone;
        
        //lay danh sach dien thoai offer
        $input['where'] = array('offer' => 1);
        $list_phone_offer = $this->product_model->get_list($input);
        $this->data['list_phone_offer'] = $list_phone_offer;
        
        //lấy danh sach laptop
        $id = 3;
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        $input['limit'] = array(5, 0);
        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $id);
            }
        }else{
            $input['where'] = array('catalog_id' => $id);
        }
        $list_laptop = $this->product_model->get_list($input);
        $this->data['list_tivi'] = $list_laptop;
        
        //lấy danh sach tablet
        $id = 29;
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        $input['limit'] = array(5, 0);
        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $id);
            }
        }else{
            $input['where'] = array('catalog_id' => $id);
        }
        $list_tablet = $this->product_model->get_list($input);
        $this->data['list_tablet'] = $list_tablet;
        
        //lấy danh sach phụ kiện
        $id = 24;
        //lay ra thông tin của thể loại
        $this->load->model('catalog_model');
        $catalog = $this->catalog_model->get_info($id);
        if(!$catalog)
        {
            redirect();
        }
        
        $this->data['catalog'] = $catalog;
        $input = array();
        $input['limit'] = array(4, 0);
        //kiêm tra xem đây là danh con hay danh mục cha
        if($catalog->parent_id == 0)
        {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if(!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub)
                {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            }else{
                $input['where'] = array('catalog_id' => $id);
            }
        }else{
            $input['where'] = array('catalog_id' => $id);
        }
        $list_accessories = $this->product_model->get_list($input);
        $this->data['list_accessories'] = $list_accessories;
        
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);
    }

}
