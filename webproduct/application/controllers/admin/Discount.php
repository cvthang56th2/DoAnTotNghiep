<?php 
Class Discount extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
    }

    function index() {
        echo "Discount";
    }
}