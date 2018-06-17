<?php
Class Specifications extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('specifications_model');
        $this->load->model('catalog_model');
    }

    function index() {
        $total_rows = $this->specifications_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        $input = array();
        $list = $this->specifications_model->get_list($input);
        foreach($list as $i=>$spec) {
            $where = array('id'=> $spec->catalog_id);
            $catalog = $this->catalog_model->get_info_rule($where);
            $list[$i]->catalog = $catalog;
        }
        
        $this->data['list'] = $list;

        //load view
        $this->data['temp'] = 'admin/specifications/index';
        $this->load->view('admin/main', $this->data);
    }    

    /*
     * Them san pham moi
     */
    function add()
    {
        //lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;
        
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
		

        if($this->input->post())
        {
            $inp = $this->input->post();
            $n = count($inp) - 1;
            for ($i = 1; $i<=$n; $i++) {
                $this->form_validation->set_rules('field'.$i, 'Trường số '.$i, 'required');
            }

            $this->form_validation->set_rules('catalog', 'Thể loại', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                $catalog_id  = $this->input->post('catalog');
                $where = array('catalog_id'=> $catalog_id);
                if ($this->specifications_model->check_exists($where)) {
                    $this->session->set_flashdata('message', 'Đã có thông số của loại sản phẩm này được');
                } else {

                    $catalog = $this->catalog_model->get_info($catalog_id);
                    $catalog_name = $catalog->name;
                    $list_spec = "[";
    
                    for ($i = 1; $i<=$n; $i++) {
                        $list_spec = $list_spec.'{"stt":"'.$i.'","name":"'.$inp['field'.$i].'"}';
                        if ($i != $n)
                            $list_spec = $list_spec.',';
                    }
                    $list_spec = $list_spec."]";
    
                    $data = array(
                        'catalog_id' => $catalog_id,
                        'list_specifications' => $list_spec
                    ); 
    
                    
                    
    
                    //them moi vao csdl
                    if($this->specifications_model->create($data))
                    {
                        //tạo ra nội dung thông báo
                        $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                        
                        $str_sql_field = "";
    
                        for ($i = 1; $i<=$n; $i++) {
                            $list_spec = $list_spec.'{"stt":"'.$i.'","name":"'.$inp['field'.$i].'"}';
                            $str_sql_field = $str_sql_field.delete_space(convert_vi_to_en($inp['field'.$i])).' TEXT';
                            if ($i != $n)
                                $str_sql_field = $str_sql_field.',';
                        }
    
                        $sql = 'CREATE TABLE '.delete_space(convert_vi_to_en($catalog_name)).'_Detail (
                            id INT(11) AUTO_INCREMENT PRIMARY KEY,
                            product_id INT(11) NOT NULL,'.$str_sql_field.')';
                        $res = $this->specifications_model->query($sql);
                    }else{
                        $this->session->set_flashdata('message', 'Không thêm được');
                    }
                    //chuyen tới trang danh sách
                }
                redirect(admin_url('specifications'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/specifications/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua san pham
     */
    function edit()
    { 
        $inp = $this->input->post();
        $n = count($inp) - 1;

        $id = $this->uri->rsegment('3');
        $spec = $this->specifications_model->get_info($id);
        if(!$spec)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại thông số kĩ thuật loại sản phẩm này');
            redirect(admin_url('specifications'));
        }
        $this->data['spec'] = $spec;
       
        //lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;
        
        //load thư viện validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //neu ma co du lieu post len thi kiem tra
        if($this->input->post())
        {
            $this->form_validation->set_rules('catalog', 'Thể loại', 'required');
            for ($i = 1; $i<=$n; $i++) {
                $this->form_validation->set_rules('field'.$i, 'Trường số '.$i, 'required');
            }

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                $catalog_id  = $this->input->post('catalog');
                $catalog_name = $catalog->name;
                $list_spec = "[";

                for ($i = 1; $i<=$n; $i++) {
                    $list_spec = $list_spec.'{"stt":"'.$i.'","name":"'.$inp['field'.$i].'"}';
                    if ($i != $n)
                        $list_spec = $list_spec.',';
                }
                $list_spec = $list_spec."]";

                $data = array(
                    'catalog_id' => $catalog_id,
                    'list_specifications' => $list_spec
                ); 
                //luu du lieu can them
                //them moi vao csdl
                if($this->specifications_model->update($catalog_id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                    
                    // $str_sql_field = "";

                    // for ($i = 1; $i<=$n; $i++) {
                    //     $list_spec = $list_spec.'{"stt":"'.$i.'","name":"'.$inp['field'.$i].'"}';
                    //     $str_sql_field = $str_sql_field.delete_space(convert_vi_to_en($inp['field'.$i])).' TEXT';
                    //     if ($i != $n)
                    //         $str_sql_field = $str_sql_field.',';
                    // }

                    // $sql = 'CREATE TABLE '.delete_space(convert_vi_to_en($catalog_name)).'_Detail (
                    //     id INT(11) AUTO_INCREMENT PRIMARY KEY,
                    //     product_id INT(11) NOT NULL,'.$str_sql_field.')';
                    // $res = $this->specifications_model->query($sql);
                }else{
                    $this->session->set_flashdata('message', 'Không sửa được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('specifications'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/specifications/edit';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Xoa du lieu
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        
        //tạo ra nội dung thông báo
        $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
        redirect(admin_url('product'));
    }
    
    /*
     * Xóa nhiều sản phẩm
     */
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id);
        }
    }
    
    /*
     *Xoa san pham
     */
    private function _del($id)
    {
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        //thuc hien xoa san pham
        $this->product_model->delete($id);
        //xoa cac anh cua san pham
        $image_link = './upload/product/'.$product->image_link;
        if(file_exists($image_link))
        {
            unlink($image_link);
        }
        //xoa cac anh kem theo cua san pham
        $image_list = json_decode($product->image_list);
        if(is_array($image_list))
        {
            foreach ($image_list as $img)
            {
                $image_link = './upload/product/'.$img;
                if(file_exists($image_link))
                {
                    unlink($image_link);
                }
            }
        }
    }

}