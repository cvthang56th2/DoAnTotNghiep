
<div class="content">
    <div class="breadcrumbs">    
        <div class="container">
            <div class="row">
                <ul>
                    <li class="home">
                        <a href="<?php echo base_url(''); ?>" title="Go to Home Page">Trang chủ</a>
                        <span>|</span>
                    </li>
                    <li class="category3">
                        <strong>Tất cả sản phẩm</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row">
                <?php $this->load->view('site/left_catalog'); ?>
                <div id="main" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-main">
                    <div class="wrap-banner-cate">
                        <a class="cate-img" href="#"><img src="<?php echo public_url(); ?>/mello_theme/images/banner-2.png" alt=""></a>
                    </div>
                    <div class="page-title category-title">
                        <h1>Tất cả sản phẩm (Tổng số <?php echo $total_rows ?>)</h1>
                    </div>
                    <div id="catalog-listing">
                        <div class="category-products page-product-list">
                            <div class="toolbar-top">
                                <div class="toolbar">

                                    <div class="pagination">
                                        <?php echo $this->pagination->create_links() ?>
                                    </div>
                                </div>
                            </div>
                            <ul class="products-grid row">
                                <?php foreach ($list as $row): ?>
                                    <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 item">
                                        <div class="item-wrap">
                                            <div class="item-image">
                                                <a class="product-image" href="<?php echo base_url('product/view/' . $row->id) ?>" title="<?php echo $row->name; ?>">
                                                    <img width="100%" class="first_image img-responsive" src="<?php echo base_url('upload/product/' . $row->image_link) ?>" alt="<?php echo $row->name; ?>"> 
                                                </a>

                                            </div>
                                            <div class="pro-info">
                                                <div class="pro-inner">
                                                    <div class="product-name"><a href="<?php echo base_url('product/view/' . $row->id) ?>"><?php echo $row->name; ?></a></div>
                                                    <div class="pro-content">
                                                        <center>
                                                            <div class='raty' style='margin:10px 0px' id='<?php echo $row->id ?>' data-score='<?php echo ($row->rate_count > 0) ? $row->rate_total / $row->rate_count : 0 ?>'></div>
                                                        </center>
                                                    </div>
                                                    <p style="text-align: center;">Lượt mua: <b><?php echo $row->buyed ?></b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end item wrap -->
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>		
</div>