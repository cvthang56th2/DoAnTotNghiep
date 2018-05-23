<div id="box-content">
    <div class="container">
        <div class="row">
            <div class="row">

                <div class="box-menu col-lg-3 col-md-3 col-sm-5 col-xs-5">
                    <div class="wrap-vertical-menu">
                        <div class="box-vertical-menu">
                            <div class="vertical-menu">
                                <div class="title">
                                    <a href="#"><span class="subtitle">Danh mục sản phẩm</span></a>
                                </div>
                                <ul class="catalog-main">
                                    <?php foreach ($catalog_list as $row): ?>
                                        <li class="catalog-main-li">
                                            <span><a href="<?php echo base_url('product/catalog/' . $row->id) ?>" title="<?php echo $row->name ?>"><?php echo $row->name ?></a></span>
                                            <?php if (!empty($row->subs)): ?>
                                                <!-- lay danh sach danh muc con -->
                                                <ul class="catalog-sub">  
                                                    <?php foreach ($row->subs as $sub): ?>    					                    
                                                        <li>
                                                            <a href="<?php echo base_url('product/catalog/' . $sub->id) ?>" title="<?php echo $sub->name ?>"> 
                                                                <?php echo $sub->name ?></a>
                                                        </li>
                                                    <?php endforeach; ?>		 			                    
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>      
                                </ul>	    
                            </div>
                        </div>
                    </div>
                    <div class="wrap-banner-07">
                        <img width="100%" src="<?php echo public_url(); ?>mello_theme/images/banner/banner-home071.png" alt="" class="img-responsive"/>
                        <div class="info">
                            <h2>hp headphones</h2>
                            <h3>Starting at<span>$499</span></h3>
                            <a class="btn-shopnow" href="#"><span>shop now</span></a>
                        </div>
                    </div>
                    <div class="block block-newarrival">
                        <div class="title">
                            <span>Sản phẩm mới</span> 
                        </div>
                        <div class="content">
                            <?php foreach ($product_newest as $row): ?>

                                <div class="item">
                                    <div class="item-wrap">
                                        <div class="item-image">
                                            <a title="<?php echo $row->name ?>" href="<?php echo base_url('product/view/' . $row->id) ?>" class="product-image no-touch">
                                                <img width="100%" alt="<?php echo $row->name ?>" src="<?php echo base_url('upload/product/' . $row->image_link) ?>" class="first_image"> 
                                            </a>

                                        </div>
                                        <div class="pro-info">
                                            <div class="pro-inner">
                                                <div class="pro-title product-name"><a href="<?php echo base_url('product/view/' . $row->id) ?>"><?php echo $row->name ?></a></div>
                                                <div class="pro-content">
                                                    <div class="wrap-price">
                                                        <div class="price-box">
                                                            <?php if ($row->discount > 0): ?>
                                                                <?php $price_new = $row->price - $row->discount; ?>
                                                                <span class="regular-price">
                                                                    <span class="price"><?php echo number_format($price_new) ?> đ</span>
                                                                </span>
                                                                <p class="special-price">
                                                                    <span class="price"><?php echo number_format($row->price) ?> đ</span>
                                                                </p>
                                                            <?php else: ?>
                                                                <span class="regular-price">
                                                                    <span class="price"><?php echo number_format($row->price) ?> đ</span>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Lượt xem: <b><?php echo $row->view ?></b></p>

                                        </div>
                                    </div>
                                    <!--end item wrap -->
                                </div>
                            <?php endforeach; ?>

                            <div class="view-all">
                                <a href="<?php echo base_url('product'); ?>">Xem tất cả sản phẩm mới</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-center col-lg-6 col-md-6 col-sm-7 col-xs-7">
                    <div class="block-layout" style="margin-top: 0"><!-- The box-center news-->
                        <div class="title" style="color: #fff;">
                            <h2>Bài viết mới</h2>
                        </div>
                        <div class="box-content-center news"><!-- The box-content-center -->
                            <div class="list_news">
                                <?php if (empty($list)): ?>
                                    <h2 style='text-align:center'>Chưa có bài viết nào</h2>
                                <?php else: ?>
                                    <?php foreach ($list as $i=>$row): ?>
                                        <div class="row">
                                            <div class="col-md-4" style="margin-top: 10px;">
                                                <a href="<?php echo site_url('news/view/' . $row->id); ?>" title="<?php echo $row->title ?>">
                                                    <img class="item_img" src="<?php echo base_url('upload/news/' . $row->image_link) ?>" alt="<?php echo $row->title; ?>" width="140" height="90">
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="item_name link" style="border-bottom: 1px solid #ccc;">
                                                    <a href="<?php echo site_url('news/view/' . $row->id); ?>" title="<?php echo $row->title; ?>">
                                                        <b><?php echo $row->title; ?></b>
                                                    </a>
                                                </div>
                                                

                                                <div class="item_time">
                                                    <?php echo mdate('%d-%m-%Y', $row->created) ?> - <?php echo $row->count_view ?> lượt xem
                                                </div>

                                                <div class="item_content">
                                                    <?php echo substr($row->intro, 0, 150) . '...'; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <hr />
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>   

                            <div class='clear'></div>
                            <div class='pagination'>
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                            <div class='clear'></div>
                        </div><!-- End box-content-center -->
                    </div>	<!-- End box-center news-->	   



                </div>
                <div class="box-right col-lg-3 col-md-3 col-sm-7 col-xs-7">
                    <div class="block block-deals" id="block-deals">
                        <div class="title">
                            <span>Khuyến mãi</span>
                        </div>
                        <div class="content">
                            <?php foreach ($product_deal as $row): ?>
                                <div class="item">
                                    <div class="item-wrap">
                                        <div class="item-image">
                                            <a title="<?php echo $row->name; ?>" href="<?php echo base_url('product/view/' . $row->id) ?>" class="product-image no-touch">
                                                <img width="100%" alt="Product demo" src="<?php echo base_url('upload/product/' . $row->image_link) ?>" class="first_image img-responsive"> 
                                            </a>
                                            <div class="item-btn">
                                                <div class="box-inner">

                                                    <div class="right">

                                                        <a href="<?php echo base_url('cart/add/' . $row->id) ?>" class="btn-cart" title="Add to cart">add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pro-info">
                                            <div class="pro-inner">
                                                <div class="pro-title product-name"><a href="<?php echo base_url('product/view/' . $row->id) ?>"><?php echo $row->name; ?></a></div>
                                                <div class="pro-content">
                                                    <div class="wrap-price">
                                                        <div class="price-box">
                                                            <?php if ($row->discount > 0): ?>
                                                                <?php $price_new = $row->price - $row->discount; ?>
                                                                <span class="regular-price">
                                                                    <span class="price"><?php echo number_format($price_new) ?> đ</span>
                                                                </span>
                                                                <p class="special-price">
                                                                    <span class="price"><?php echo number_format($row->price) ?> đ</span>
                                                                </p>
                                                            <?php else: ?>
                                                                <span class="regular-price">
                                                                    <span class="price"><?php echo number_format($row->price) ?> đ</span>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>

                                                    <div class="pro-content">
                                                        <center>
                                                            <div class='raty' style='margin:10px 0px' id='<?php echo $row->id ?>' data-score='<?php echo ($row->rate_count > 0) ? $row->rate_total / $row->rate_count : 0 ?>'></div>
                                                        </center>
                                                    </div>
                                                    <p style="text-align:center">Lượt xem: <b><?php echo $row->view ?></b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end item wrap -->
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="navslider">
                            <a href="#" class="prev">Prev</a>
                            <a href="#" class="next">Next</a>
                        </div>
                        <script type="text/javascript">
                            setInterval(function () {
                                $('#block-deals .navslider .next').click();
                            }, 3000);
                            jQuery(document).ready(function ($) {
                                $('#block-deals div.content').owlCarousel({
                                    items: 1,
                                    itemsCustom: [
                                        [0, 1],
                                        [480, 1],
                                        [768, 1],
                                        [992, 1],
                                        [1200, 1]
                                    ],
                                    pagination: false,
                                    slideSpeed: 800,
                                    addClassActive: true,
                                    scrollPerPage: false,
                                    touchDrag: false,
                                    afterAction: function (e) {
                                        if (this.$owlItems.length > this.options.items) {
                                            $('#block-deals .navslider').show();
                                        } else {
                                            $('#block-deals .navslider').hide();
                                        }
                                    }
                                    //scrollPerPage: true,
                                });
                                $('#block-deals .navslider .prev').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-deals div.content').trigger('owl.prev');
                                });
                                $('#block-deals .navslider .next').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-deals div.content').trigger('owl.next');
                                });
                            });
                            //]]>
                        </script>
                        <div class="wrap-viewall">
                            <div class="view-all">
                                <a href="<?php echo base_url(); ?>">Tất cả khuyến mãi</a>
                            </div>
                        </div>
                    </div>
                    <div class="block block-brand">
                        <div class="title">
                            <span>Tin tức</span> 
                        </div>
                        <div class="content">
                            <?php foreach ($news_list as $i => $row): ?>
                                <div class="row">
                                    <div class="col-md-4" <?php if ($i == 0) echo 'style="margin-top: 10px"'; ?>>
                                        <a title="<?php echo $row->title ?>" href="<?php echo base_url('news/view/' . $row->id) ?>" class="product-image no-touch">
                                            <img width="100%" alt="Product demo" src="<?php echo base_url('upload/news/' . $row->image_link) ?>" class="first_image img-responsive"> 
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <a title="<?php echo $row->title ?>" href="<?php echo base_url('news/view/' . $row->id) ?>" class="product-image no-touch"><?php echo $row->title ?></a>
                                        <p><?php echo substr($row->intro, 0, 60) . "..." ?></p>
                                    </div>
                                    <!--end item wrap -->
                                </div>
                            <?php endforeach; ?>

                            <div class="view-all">
                                <a href="<?php echo base_url('news'); ?>">Xem tất cả tin tức</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>