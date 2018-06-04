<?php
Class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');

    }
    
    /*
     * Phuoc thuc them san pham vao gio hang
     */
    function add()
    {
        //lay ra san pham muon them vao gio hang
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            redirect();
        }
        if($product->available_quantity <= 0)
        {
            $this->session->set_flashdata('message_type', 'warn');
            $this->session->set_flashdata('message', 'Số lượng hàng tồn kho đã hết!');
            redirect();
            return;
        }
        
        //tong so san pham
        $qty = 1;
        $price = $product->price;
        if($product->discount > 0)
        {
            $price = $product->price - $product->discount;
        }
        
        //thong tin them vao gio hang
        $data = array();
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = url_title($product->name);
        $data['image_link']  = $product->image_link;
        $data['price'] = $price;
        $this->cart->insert($data);
        
        $this->session->set_flashdata('message_type', 'success');
        $this->session->set_flashdata('message', 'Thêm vào giỏ hành thành công!');
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
    
    /*
     * Hien thị ra danh sách sản phẩm trong gio hàng
     */
    function index()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        //tong so san pham co trong gio hang
        $total_items = $this->cart->total_items();
        
        $this->data['carts'] = $carts;
        $this->data['total_items']  =$total_items;
        
        $this->data['temp']  ='site/cart/index';
        $this->load->view('site/layout', $this->data);
    }
    
    /*
     * Cập nhật giỏ hàng
     */
    function update()
    {
        //thong gio hang
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row)
        {
            $product = $this->product_model->get_info($row['id']);
            
            //tong so luong san pham
            $total_qty = $this->input->post('qty_'.$row['id']);
            if ($product->available_quantity - $total_qty < 0) {
                $this->session->set_flashdata('message_type', 'warn');
                $this->session->set_flashdata('message', 'Số lượng tồn kho của <strong>'.$product->name.'</strong> không đủ!');
                redirect(base_url('cart'));
                return;
            }
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        
        $this->session->set_flashdata('message_type', 'success');
        $this->session->set_flashdata('message', 'Cập nhật giỏ hành thành công!');
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
    
    /*
     * Xoa sản phẩm trong gio hang
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if($id > 0)
        {
            //thong gio hang
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row)
            {
                if($row['id'] == $id)
                {
                    //tong so luong san pham
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        }else{
            //xóa toàn bô giỏ hang
            $this->cart->destroy();
        }
        
        $this->session->set_flashdata('message_type', 'success');
        $this->session->set_flashdata('message', 'Xóa thành công!');
        //chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
}


