<div id="box-content">
    <div class="container">
        <div class="row">
            <div class="row">
                <?php $this->load->view('site/slide', $this->data); ?>

                <?php $this->load->view('site/left'); ?>

                <div class="box-center col-lg-6 col-md-6 col-sm-7 col-xs-7">


                    <div class="block-layout block-offers" id="block-offers" style="margin-top: 0">
                        <div class="title">
                            <a href="#">Sản phẩm khuyến nghị</a>
                        </div>
                        <div class="wrap-content">
                            <div class="content">
                                <?php foreach ($list_phone_offer as $row): ?>
                                    <div class="item">
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
                                                    <p style="float:left;margin-left:10px">Lượt mua: <b><?php echo $row->buyed ?></b></p>
                                                    <div class="wrap-cart"><a title="Xem chi tiết" class="btn-cart" href="<?php echo base_url('product/view/' . $row->id) ?>">Chi tiết <i class="fas fa-info-circle"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end item wrap -->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="navslider">
                            <a href="#" class="prev">Prev</a>
                            <a href="#" class="next">Next</a>
                        </div>
                        <script type="text/javascript">
                            //<![CDATA[
                            jQuery(document).ready(function ($) {
                                setInterval(function () {
                                    $('#block-offers .navslider .prev').click();
                                }, 3000);
                                $('#block-offers div.content').owlCarousel({
                                    items: 2,
                                    itemsCustom: [
                                        [0, 1],
                                        [480, 2],
                                        [768, 2],
                                        [992, 3],
                                        [1200, 3]
                                    ],
                                    loops: true,
                                    autoplay: true,
                                    autoplayTimeout: 1000,
                                    autoplayHoverPause: true,
                                    pagination: false,
                                    slideSpeed: 800,
                                    addClassActive: true,
                                    scrollPerPage: false,
                                    touchDrag: false,
                                    afterAction: function (e) {
                                        if (this.$owlItems.length > this.options.items) {
                                            $('#block-offers .navslider').show();
                                        } else {
                                            $('#block-offers .navslider').hide();
                                        }
                                    }
                                    //scrollPerPage: true,
                                });
                                $('#block-offers .navslider .prev').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-offers div.content').trigger('owl.prev');
                                });
                                $('#block-offers .navslider .next').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-offers div.content').trigger('owl.next');
                                });
                            });
                            //]]>
                        </script>
                    </div>
                    <div class="block-layout block-tab" id="block-tab">
                        <div class="tab-item1">
                            <div class="title">
                                <a href="#">Các sản phẩm</a> 
                                <ul>
                                    <li class="active"><a data-toggle="tab" href="#tab4"><span>Điện thoại</span></a></li>
                                    <li><a data-toggle="tab" href="#tab5"><span>Laptop</span></a></li>
                                    <li><a data-toggle="tab" href="#tab6"><span>Tivi</span></a></li>
                                    <li class="last"><a data-toggle="tab" href="#tab7"><span>Máy tính bảng</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div id="tab4" class="tab-pane active">
                                <div class="wrap-content">
                                    <div class="content">
                                        <?php foreach ($list_phone as $row): ?>
                                            <div class="item">
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
                                                                <div class="ratings">
                                                                    <center>
                                                                        <div class='raty' style='margin:10px 0px' id='<?php echo $row->id ?>' data-score='<?php echo ($row->rate_count > 0) ? $row->rate_total / $row->rate_count : 0 ?>'></div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <div class="wrap-cart"><a title="Xem chi tiết" class="btn-cart" href="<?php echo base_url('product/view/' . $row->id) ?>">Chi tiết <i class="fas fa-info-circle"></i></a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end item wrap -->
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="navslider">
                                    <a href="#" class="prev">Prev</a>
                                    <a href="#" class="next">Next</a>
                                </div>
                            </div>
                            <div id="tab5" class="tab-pane">
                                <div class="wrap-content">
                                    <div class="content">
                                        <?php foreach ($list_laptop as $row): ?>
                                            <div class="item">
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
                                                                <div class="ratings">
                                                                    <center>
                                                                        <div class='raty' style='margin:10px 0px' id='<?php echo $row->id ?>' data-score='<?php echo ($row->rate_count > 0) ? $row->rate_total / $row->rate_count : 0 ?>'></div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <p style="text-align: center;padding-top: 80px;">Lượt mua: <b><?php echo $row->buyed ?></b></p>
                                                            <div class="wrap-cart"><a title="Add to cart" class="btn-cart" href="<?php echo base_url('cart/add/' . $row->id) ?>"><i class="fas fa-cart-plus"></i> Thêm</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end item wrap -->
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="navslider">
                                    <a href="#" class="prev">Prev</a>
                                    <a href="#" class="next">Next</a>
                                </div>
                            </div>
                            <div id="tab6" class="tab-pane">
                                <div class="wrap-content">
                                    <div class="content">
                                        <?php foreach ($list_tivi as $row): ?>
                                            <div class="item">
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
                                                                <div class="ratings">
                                                                    <center>
                                                                        <div class='raty' style='margin:10px 0px' id='<?php echo $row->id ?>' data-score='<?php echo ($row->rate_count > 0) ? $row->rate_total / $row->rate_count : 0 ?>'></div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <p style="text-align: center;padding-top: 80px;">Lượt mua: <b><?php echo $row->buyed ?></b></p>
                                                            <div class="wrap-cart"><a title="Add to cart" class="btn-cart" href="<?php echo base_url('cart/add/' . $row->id) ?>"><i class="fas fa-cart-plus"></i> Thêm</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end item wrap -->
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="navslider">
                                    <a href="#" class="prev">Prev</a>
                                    <a href="#" class="next">Next</a>
                                </div>
                            </div>
                            <div id="tab7" class="tab-pane">
                                <div class="wrap-content">
                                    <div class="content">
                                        <?php foreach ($list_tablet as $row): ?>
                                            <div class="item">
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
                                                                <div class="ratings">
                                                                    <center>
                                                                        <div class='raty' style='margin:10px 0px' id='<?php echo $row->id ?>' data-score='<?php echo ($row->rate_count > 0) ? $row->rate_total / $row->rate_count : 0 ?>'></div>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                            <p style="text-align: center;padding-top: 80px;">Lượt mua: <b><?php echo $row->buyed ?></b></p>
                                                            <div class="wrap-cart"><a title="Add to cart" class="btn-cart" href="<?php echo base_url('cart/add/' . $row->id) ?>"><i class="fas fa-cart-plus"></i> Thêm</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end item wrap -->
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="navslider">
                                    <a href="#" class="prev">Prev</a>
                                    <a href="#" class="next">Next</a>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            //<![CDATA[
                            jQuery(document).ready(function ($) {
                                $('#block-tab div.content').owlCarousel({
                                    items: 2,
                                    itemsCustom: [
                                        [0, 2],
                                        [480, 2],
                                        [768, 3],
                                        [992, 4],
                                        [1200, 4]
                                    ],
                                    loops: true,
                                    autoplay: true,
                                    autoplayTimeout: 1000,
                                    autoplayHoverPause: true,
                                    pagination: false,
                                    slideSpeed: 800,
                                    addClassActive: true,
                                    scrollPerPage: false,
                                    touchDrag: false,
                                    afterAction: function (e) {
                                        if (this.$owlItems.length > this.options.items) {
                                            $('#block-tab .navslider').show();
                                        } else {
                                            $('#block-tab .navslider').hide();
                                        }
                                    }
                                    //scrollPerPage: true,
                                });
                                $('#block-tab .navslider .prev').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-tab div.content').trigger('owl.prev');
                                });
                                $('#block-tab .navslider .next').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-tab div.content').trigger('owl.next');
                                });
                            });
                            //]]>
                        </script> 
                    </div>

                    <div class="block-layout">
                        <div class="title" style="margin-top: 30px;">
                            <a href="#">phụ kiện</a>
                        </div>

                        <div class="content">
                            <?php foreach ($list_accessories as $row): ?>
                                <div class="item col-md-6">
                                    <div class="item-wrap">
                                        <div class="item-image" style="border: 1px solid #ccc; width: 50%">
                                            <a title="<?php echo $row->name; ?>" href="<?php echo base_url('product/view/' . $row->id) ?>" class="product-image no-touch" style="text-align: center">
                                                <img width="100%" alt="Product demo" src="<?php echo base_url('upload/product/' . $row->image_link) ?>" class="first_image img-responsive"> 
                                            </a>

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
                                                </div>
                                            </div>
                                        </div>
                                        <div style="text-align: center;margin-top: 50px;">
                                            <a href="<?php echo base_url('cart/add/' . $row->id) ?>" class="btn-cart" title="Add to cart" style="color: white; padding: 5px 10px;background: #4e5159;"><i class="fas fa-cart-plus"></i> Thêm</a>
                                        </div>
                                    </div>
                                    <!--end item wrap -->
                                </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="btn-view-all">
                            <a href="<?php echo base_url('product/catalog/24'); ?>">Xem tất cả phụ kiện</a>
                        </div>
                    </div>

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

                                                        <a href="<?php echo base_url('cart/add/' . $row->id) ?>" class="btn-cart" title="Add to cart"><i class="fas fa-cart-plus"></i> Thêm</a>
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
                    <div class="block wrap-bestseller" id="bestseller">
                        <div class="title">
                            <span>bán chạy nhất</span> 
                        </div>
                        <div class="panel-group" id="accordion">
                            <?php for ($i = 0; $i < count($product_buy); $i++): ?>
                                <div class="panel panel-default">
                                    <a class="accordion-toggle <?php
                                    echo "item" . ($i + 1);
                                    if ($i == 0)
                                        echo " active"
                                        ?>  " data-toggle="collapse" data-parent="#accordion" href="#item<?php echo $i + 1; ?>">
                                           <?php echo $i + 1; ?>
                                    </a> 
                                    <div id="item<?php echo $i + 1; ?>" class="panel-collapse">
                                        <div class="item">
                                            <div class="item-wrap">
                                                <div class="item-image">
                                                    <a title="<?php echo $product_buy[$i]->name; ?>" href="<?php echo base_url('product/view/' . $product_buy[$i]->id) ?>" class="product-image no-touch">
                                                        <img width="100%" alt="Product demo" src="<?php echo base_url('upload/product/' . $product_buy[$i]->image_link) ?>" class="first_image img-responsive"> 
                                                    </a>
                                                    <div class="item-btn">
                                                        <div class="box-inner">

                                                            <div class="left">

                                                                <a href="<?php echo base_url('cart/add/' . $product_buy[$i]->id) ?>" class="btn-cart" title="Add to cart"><i class="fas fa-cart-plus"></i> Thêm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pro-info">
                                                    <div class="pro-inner">
                                                        <div class="pro-title product-name"><a href="<?php echo base_url('product/view/' . $product_buy[$i]->id) ?>"><?php echo $product_buy[$i]->name; ?></a></div>
                                                        <div class="pro-content">
                                                            <div class="wrap-price">
                                                                <div class="price-box">
                                                                    <?php if ($product_buy[$i]->discount > 0): ?>
                                                                        <?php $price_new = $product_buy[$i]->price - $product_buy[$i]->discount; ?>
                                                                        <span class="regular-price">
                                                                            <span class="price"><?php echo number_format($price_new) ?> đ</span>
                                                                        </span>
                                                                        <p class="special-price">
                                                                            <span class="price"><?php echo number_format($product_buy[$i]->price) ?> đ</span>
                                                                        </p>
                                                                    <?php else: ?>
                                                                        <span class="regular-price">
                                                                            <span class="price"><?php echo number_format($product_buy[$i]->price) ?> đ</span>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="pro-content">
                                                                <center>
                                                                    <div class='raty' style='margin:10px 0px' id='<?php echo $product_buy[$i]->id ?>' data-score='<?php echo ($product_buy[$i]->rate_count > 0) ? $product_buy[$i]->rate_total / $product_buy[$i]->rate_count : 0 ?>'></div>
                                                                </center>
                                                            </div>
                                                            <p style="text-align:center">Lượt mua: <b><?php echo $product_buy[$i]->buyed ?></b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end item wrap -->
                                        </div>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                        <div class="wrap-viewall">
                            <div class="view-all">
                                <a href="#">Xem tất cả </a>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $('.panel-default .accordion-toggle').click(function (e) {
                                e.preventDefault();
                                $('.accordion-toggle').removeClass('active');
                                $(this).addClass('active');
                            });
                        </script>
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