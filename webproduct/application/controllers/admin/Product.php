<?php
Class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
        $this->load->model('catalog_model');
    }
    
    /*
     * Hien thi danh sach san pham
     */
    function index()
    {
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;
        
        //load ra thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tong tat ca cac san pham tren website
        $config['base_url']   = admin_url('product/index'); //link hien thi ra danh sach san pham
        $config['per_page']   = 10;//so luong san pham hien thi tren 1 trang
        $config['uri_segment'] = 4;//phan doan hien thi ra so trang tren url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khoi tao cac cau hinh phan trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        //kiem tra co thuc hien loc du lieu hay khong
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if($name)
        {
            $input['like'] = array('name', $name);
        }
        $catalog_id = $this->input->get('catalog');
        $catalog_id = intval($catalog_id);
        if($catalog_id > 0)
        {
            $input['where']['catalog_id'] = $catalog_id;
        }
        
        //lay danh sach san pha
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;
       
        //lay danh sach danh muc san pham
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
        
        //lay nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        
        //load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Them san pham moi
     */

    function get_spec() {
        $catalog = $this->catalog_model->get_info($this->input->get('catalog'));
        $catalog_parent_id = $catalog->parent_id;
        $catalog_parent = $this->catalog_model->get_info($catalog_parent_id);
        
        $sql = 'SELECT * FROM `'.delete_space(convert_vi_to_en($catalog_parent->name)).'_detail`';
        $res = $this->catalog_model->query($sql);
        pre($res);

        // $where = array('catalog_id' => $catalog_parent_id);
        // $res = $this->specifications_model->get_list($where);
        // pre($res);
    }

    function add()
    {
        //lay danh sach danh muc san pham
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
            

            // $this->form_validation->set_rules('name', 'Tên', 'required');
            // $this->form_validation->set_rules('catalog', 'Thể loại', 'required');
            // $this->form_validation->set_rules('price', 'Giá', 'required');
            // $this->form_validation->set_rules('available_quantity', 'Giá', 'required');
            // $this->form_validation->set_rules('detail', 'Chi tiết sản phẩm', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                pre($this->input->post('catalog'));
                //them vao csdl
                // $name        = $this->input->post('name');
                // $catalog_id  = $this->input->post('catalog');
                // $price       = $this->input->post('price');
                // $available_quantity       = $this->input->post('available_quantity');
                // $price       = str_replace(',', '', $price);
                

                // $discount = $this->input->post('discount');
                // $discount = str_replace(',', '', $discount);
                // $detail       = $this->input->post('detail');

                // $date_discount = new DateTime($this->input->post('date_discount'));
                // sscanf($date_discount->format('j-n-Y G:i:s'), '%d-%d-%d %d:%d:%d', $day, $month, $year, $hour, $minute, $second);
                // $date_discount = mktime($hour, $minute, $second, $month, $day, $year);
                
                // //lay ten file anh minh hoa duoc update len
                // $this->load->library('upload_library');
                // $upload_path = './upload/product';
                // $upload_data = $this->upload_library->upload($upload_path, 'image');  
                // $image_link = '';
                // if(isset($upload_data['file_name']))
                // {
                //     $image_link = $upload_data['file_name'];
                // }
                // //upload cac anh kem theo
                // $image_list = array();
                // $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                // $image_list = json_encode($image_list);
                
                // //luu du lieu can them
                // $data = array(
                //     'name'       => $name,
                //     'catalog_id' => $catalog_id,
                //     'price'      => $price,
                //     'image_link' => $image_link,
                //     'image_list' => $image_list,
                //     'discount'   => $discount,
                //     'warranty'   => $this->input->post('warranty'),
                //     'gifts'      => $this->input->post('gifts'),
                //     'site_title' => $this->input->post('site_title'),
                //     'meta_desc'  => $this->input->post('meta_desc'),
                //     'meta_key'   => $this->input->post('meta_key'),
                //     'content'    => $this->input->post('content'),
                //     'available_quantity' => $available_quantity,
                //     'date_discount' => $date_discount,
                //     'created'    => now(),
                //     'detail' => $detail
                // ); 
                // //them moi vao csdl
                // if($this->product_model->create($data))
                // {
                //     //tạo ra nội dung thông báo
                //     $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                // }else{
                //     $this->session->set_flashdata('message', 'Không thêm được');
                // }
                // //chuyen tới trang danh sách
                // redirect(admin_url('product'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/product/add';
        $this->load->view('admin/main', $this->data);
    }
    
    /*
     * Chinh sua san pham
     */
    function edit()
    {
        $id = $this->uri->rsegment('3');
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            //tạo ra nội dung thông báo
            $this->session->set_flashdata('message', 'Không tồn tại sản phẩm này');
            redirect(admin_url('product'));
        }
        $this->data['product'] = $product;
       
        //lay danh sach danh muc san pham
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
            $this->form_validation->set_rules('name', 'Tên', 'required');
            $this->form_validation->set_rules('catalog', 'Thể loại', 'required');
            $this->form_validation->set_rules('price', 'Giá', 'required');
            $this->form_validation->set_rules('available_quantity', 'Số lượng', 'required');
            $this->form_validation->set_rules('detail', 'Chi tiết sản phẩm', 'required');

            //nhập liệu chính xác
            if($this->form_validation->run())
            {
                //them vao csdl
                $name        = $this->input->post('name');
                $catalog_id  = $this->input->post('catalog');
                $price       = $this->input->post('price');
                $price       = str_replace(',', '', $price);
               
                $discount = $this->input->post('discount');
                $discount = str_replace(',', '', $discount);
                $available_quantity       = $this->input->post('available_quantity');
                $detail       = $this->input->post('detail');

                $date_discount = new DateTime($this->input->post('date_discount'));
                sscanf($date_discount->format('j-n-Y G:i:s'), '%d-%d-%d %d:%d:%d', $day, $month, $year, $hour, $minute, $second);
                $date_discount = mktime($hour, $minute, $second, $month, $day, $year);

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if(isset($upload_data['file_name']))
                {
                    $image_link = $upload_data['file_name'];
                }
            
                //upload cac anh kem theo
                $image_list = array();
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list_json = json_encode($image_list);
        
                //luu du lieu can them
                $data = array(
                    'name'       => $name,
                    'catalog_id' => $catalog_id,
                    'price'      => $price,
                    'discount'   => $discount,
                    'warranty'   => $this->input->post('warranty'),
                    'gifts'      => $this->input->post('gifts'),
                    'site_title' => $this->input->post('site_title'),
                    'meta_desc'  => $this->input->post('meta_desc'),
                    'meta_key'   => $this->input->post('meta_key'),
                    'content'    => $this->input->post('content'),
                    'available_quantity' => $available_quantity,
                    'date_discount' => $date_discount,
                    'detail' => $detail
                );
                if($image_link != '')
                {
                    $data['image_link'] = $image_link;
                }
                
                if(!empty($image_list))
                {
                    $data['image_list'] = $image_list_json;
                }
                
                //them moi vao csdl
                if($this->product_model->update($product->id, $data))
                {
                    //tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Cập nhật dữ liệu thành công');
                }else{
                    $this->session->set_flashdata('message', 'Không cập nhật được');
                }
                //chuyen tới trang danh sách
                redirect(admin_url('product'));
            }
        }
        
        
        //load view
        $this->data['temp'] = 'admin/product/edit';
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



