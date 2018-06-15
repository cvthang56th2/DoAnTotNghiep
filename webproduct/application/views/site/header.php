<!-- The box-header-->			        
<link rel="stylesheet" href="<?php echo public_url() ?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">	
<script src="<?php echo public_url() ?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $("#text-search").autocomplete({
            source: "<?php echo site_url('product/search/1') ?>",
        });
    });
</script>

<div id="box-header">
    <div class="header-container">
        <div class="header">
            <div class="box-header-01">
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="block-left col-lg-6 col-md-6 col-sm-5 col-xs-6">
                                <div class="block box-left">
                                    <ul>
                                        <li><a href="#">Về chúng tôi</a></li>
                                        <li><a href="#">Thông tin liên lạc</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="block-right col-lg-6 col-md-6 col-sm-7 col-xs-6">
                                <div class="my-account">
                                    <?php if (isset($user_info)): ?>
                                        <span class="my-account-title"><?php echo $user_info->name ?></span>
                                        <div class="content">
                                            <ul class="left">
                                                <li><a href="<?php echo site_url('user') ?>" class="top-link-myaccount">Thông tin tài khoản</a></li>
                                                <li><a href="<?php echo site_url('user/order_history') ?>" class="top-link-myaccount">Lịch sử giao dịch</a></li>
                                                <li><a href="<?php echo site_url('order/checkout') ?>" class="top-link-checkout">Thanh toán</a></li>
                                                <li><a href="<?php echo site_url('user/logout') ?>" class="top-link-login">Thoát</a></li>
                                            </ul>
                                        </div>
                                    <?php else: ?>
                                        <span class="my-account-title">Tài khoản</span>
                                        <div class="content">
                                            <ul class="left">
                                                <li><a href="<?php echo site_url('user/login') ?>" class="top-link-login">Đăng nhập</a></li>
                                                <li><a href="<?php echo site_url('user/register') ?>" >Tạo tài khoản</a></li>
                                                <li><a href="<?php echo base_url('cart') ?>" class="top-link-wishlist">Giỏ hàng</a></li>
                                                <li><a href="<?php echo site_url('order/checkout') ?>" class="top-link-checkout">Thanh toán</a></li>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <div class="box-search" id="search">
                                    <form action="<?php echo site_url('product/search') ?>" method="get">
                                        <form action="<?php echo site_url('product/search') ?>" method="get">
                                            <button><span>search</span></button>
                                            <input type="text" aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" class="ui-autocomplete-input" placeholder="Tìm kiếm sản phẩm..." value="<?php echo isset($key) ? $key : '' ?>" name="key-search" id="text-search">
                                        </form>
                                    </form>
                                </div>
                            </div>
                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    w = $(window).width();
                                    if (w < 768) {
                                        $('.my-account .content').hide();
                                        $('.my-account').click(function () {
                                            $('.content').slideToggle();
                                        });
                                        $('.cart-mini .block-content').hide();
                                        $('.cart-mini').click(function () {
                                            $('.cart-mini .block-content').slideToggle();
                                        });

                                        $('.block-language ul').hide();
                                        $('.block-language').click(function () {
                                            $('.block-language ul').slideToggle();
                                        });
                                        $('.block-currency ul').hide();
                                        $('.block-currency').click(function () {
                                            $('.block-currency ul').slideToggle();
                                        });
                                    }
                                })
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-header-02">
                <div class="container">
                    <div class="row">
                        <div class="logo">
                            <a href="<?php echo base_url(''); ?>"><img src="<?php echo public_url(); ?>mello_theme/images/yoloLogo1.png" alt="Logo YoloShop"></a>
                        </div>
                        <div id="mobile-nav">
                            <button class="btn-sidebar" type="button"><span>menu</span></button> 
                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {
                                    $('.block-slidebar').html($('.mobile-sidebar').html());
                                    $('.mobile-sidebar').remove();
                                    $('.btn-sidebar').click(function () {
                                        if ($('body').hasClass('show-menu')) {
                                            $('body').removeClass('show-menu');
                                        } else {
                                            $('body').addClass('show-menu');
                                        }
                                    });
                                    $('.close-menu').click(function () {
                                        if ($('body').hasClass('show-menu')) {
                                            $('body').removeClass('show-menu');
                                        } else {
                                            $('body').addClass('show-menu');
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <div class="menu">
                            <div class="box-main-menu">
                                <div class="main-menu">
                                    <ul>
                                        <li class="item1 first"><a href="<?php echo base_url(''); ?>">Trang chủ</a></li>
                                        <li class="item2 megamenu-parent">
                                            <a href="<?php echo base_url('product'); ?>">Sản phẩm</a>
                                            <img class="stick-07" src="<?php echo public_url(); ?>mello_theme/images/stick/hot07.png" alt="">
                                            <div class="vt_megamenu_content">
                                                <div class="mega-menu-01">
                                                    <div class="menu-01 menu-01-cate">
                                                        <div class="title"><span><a href="<?php echo base_url('product'); ?>">Danh mục sản phẩm</a></span></div>
                                                        <ul class="content-col">
                                                            <?php foreach ($catalog_list as $row): ?>
                                                                <li><a class="<?php echo $row->icon; ?>" href="<?php echo base_url('product/catalog/' . $row->id.'/'.changeName($row->name)) ?>"><span><?php echo $row->name ?></span></a></li>

                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>

                                                    <div id="feature" class="menu-01 menu-01-feature carousel-feature">
                                                        <div class="title"><span>Sản phẩm mới</span><span class="new">New</span></div>
                                                        <div class="carousel-inner">
                                                            <?php foreach ($product_newest as $i => $row): ?>
                                                                <div class="item <?php if ($i == 0) echo " active"; ?> ">
                                                                    <div class="item-wrap">
                                                                        <div class="item-image">
                                                                            <a title="<?php echo $row->name ?>" href="<?php echo base_url('product/view/' . $row->id.'/'.changeName($row->name)) ?>" class="product-image no-touch">
                                                                                <img width="100%" alt="<?php echo $row->name ?>" src="<?php echo base_url('upload/product/' . $row->image_link) ?>" class="first_image"> 
                                                                            </a>

                                                                        </div>
                                                                        <div class="pro-info">
                                                                            <div class="pro-inner">
                                                                                <div class="pro-title product-name"><a href="<?php echo base_url('product/view/' . $row->id.'/'.changeName($row->name)) ?>"><?php echo $row->name ?></a></div>
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

                                                            <button class="carousel-button carousel-prev-button"><i class="fas fa-chevron-left"></i></button>
                                                            <button class="carousel-button carousel-next-button"><i class="fas fa-chevron-right"></i></button>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    setInterval(function () {
                                                                        $('#feature .carousel-next-button').click()
                                                                    }, 4000);
                                                                    $('#feature .carousel-next-button').click(function () {
                                                                        var n = $('#feature .carousel-inner .item').length;
                                                                        var i;
                                                                        for (i = 0; i < n; i++) {
                                                                            if ($('#feature .carousel-inner .item:nth(' + i + ')').hasClass("active")) {
                                                                                $('#feature .carousel-inner .item:nth(' + i + ')').removeClass("active");
                                                                                if (i == n - 1)
                                                                                    i = -1;
                                                                                break;
                                                                            }
                                                                        }
                                                                        $('#feature .carousel-inner .item:nth(' + (i + 1) + ')').addClass("active");
//                                                                
                                                                    })
                                                                    $('#feature .carousel-prev-button').click(function () {
                                                                        var n = $('#feature .carousel-inner .item').length;
                                                                        var i;
                                                                        for (i = 0; i < n; i++) {
                                                                            if ($('#feature .carousel-inner .item:nth(' + i + ')').hasClass("active")) {
                                                                                $('#feature .carousel-inner .item:nth(' + i + ')').removeClass("active");
                                                                                break;
                                                                            }
                                                                        }
                                                                        $('#feature .carousel-inner .item:nth(' + (i - 1) + ')').addClass("active");
                                                                    })
                                                                })

                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="menu-01 menu-01-sale" id="sale">
                                                        <div class="title"><span>Sale</span></div>
                                                        <div class="carousel-inner">
                                                            <?php foreach ($product_deal as $i => $row): ?>
                                                                <div class="item <?php if ($i == 0) echo " active"; ?> ">
                                                                    <div class="item-wrap">
                                                                        <div class="item-image">
                                                                            <a title="<?php echo $row->name ?>" href="<?php echo base_url('product/view/' . $row->id.'/'.changeName($row->name)) ?>" class="product-image no-touch">
                                                                                <img width="100%" alt="<?php echo $row->name ?>" src="<?php echo base_url('upload/product/' . $row->image_link) ?>" class="first_image"> 
                                                                            </a>

                                                                        </div>
                                                                        <div class="pro-info">
                                                                            <div class="pro-inner">
                                                                                <div class="pro-title product-name"><a href="<?php echo base_url('product/view/' . $row->id.'/'.changeName($row->name)) ?>"><?php echo $row->name ?></a></div>
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

                                                            <button class="carousel-button carousel-prev-button"><i class="fas fa-chevron-left"></i></button>
                                                            <button class="carousel-button carousel-next-button"><i class="fas fa-chevron-right"></i></button>
                                                            <script>
                                                                $(document).ready(function () {
                                                                    setInterval(function () {
                                                                        $('#sale .carousel-next-button').click()
                                                                    }, 4000);
                                                                    $('#sale .carousel-next-button').click(function () {
                                                                        var n = $('#sale .carousel-inner .item').length;
                                                                        var i;
                                                                        for (i = 0; i < n; i++) {
                                                                            if ($('#sale .carousel-inner .item:nth(' + i + ')').hasClass("active")) {
                                                                                $('#sale .carousel-inner .item:nth(' + i + ')').removeClass("active");
                                                                                if (i == n - 1)
                                                                                    i = -1;
                                                                                break;
                                                                            }
                                                                        }
                                                                        $('#sale .carousel-inner .item:nth(' + (i + 1) + ')').addClass("active");
//                                                                
                                                                    })
                                                                    $('#sale .carousel-prev-button').click(function () {
                                                                        var n = $('#sale .carousel-inner .item').length;
                                                                        var i;
                                                                        for (i = 0; i < n; i++) {
                                                                            if ($('#sale .carousel-inner .item:nth(' + i + ')').hasClass("active")) {
                                                                                $('#sale .carousel-inner .item:nth(' + i + ')').removeClass("active");
                                                                                break;
                                                                            }
                                                                        }
                                                                        $('#sale .carousel-inner .item:nth(' + (i - 1) + ')').addClass("active");
                                                                    })
                                                                })

                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="item3 megamenu-parent">
                                            <a href="<?php echo base_url('news') ?>">Tin tức</a>
                                            <img class="stick-07" src="<?php echo public_url(); ?>mello_theme/images/stick/new07.png" alt="">

                                        </li>
                                        <li class="item4">
                                            <a href="<?php echo base_url('contact') ?>">Liên hệ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="account-and-cart" style="float: right; margin-right: 50px;">
                            <div class="box-cart">
                                <div class="cart-mini">
                                    <a href="<?php echo base_url('cart') ?>">
                                    <div class="title">
                                        <span class="item" id="count_carts"><?php echo count($carts) ?></span>
                                    </div>
                                    </a>
                                    
                                    <div class="block-content">
                                        <div class="inner">
                                            <p class="block-subtitle">Thêm gần đây</p>
                                            <?php $total_amount = 0; ?>
                                            <ol id="cart-sidebar" class="mini-products-list">
                                                <?php foreach ($carts as $i => $row): ?>
                                                    <?php $total_amount = $total_amount + $row['subtotal']; ?>
                                                    <li class="item row">
                                                        <a href="<?php echo base_url('product/view/' . $row['id']) ?>" title="<?php echo $row['name']; ?>" class="product-image" style="width: 40%">
                                                            <img width="100%" src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" alt="<?php echo $row['name']; ?>">
                                                        </a>
                                                        <a href="<?php echo base_url('cart/del/' . $row['id']) ?>" class="btn-remove">Remove This Item</a>
                                                        <div class="product-details">
                                                            <p class="product-name"><a title="<?php echo $row['name']; ?>" href="<?php echo base_url('product/view/' . $row['id']) ?>"><?php echo $row['name']; ?></a></p>
                                                            <span class="price">
                                                                <span class="regular-price">
                                                                    <span class="price"><?php echo number_format($row['price']) ?> đ</span>
                                                                </span>
                                                            </span>       
                                                            <div class="qty-abc">
                                                                <label>Số lượng: </label>
                                                                <input value="<?php echo $row['qty']; ?>" type="text" name="qty_<?php echo $row['id'] ?>">
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ol>
                                            <div class="summary">
                                                <p class="subtotal">
                                                    <span class="label">Tổng cộng:</span> <span class="price" id="total_carts"><?php echo number_format($total_amount); ?> đ</span>                                                                        
                                                </p>
                                            </div>
                                            <div class="actions">
                                                <div class="a-inner">
                                                    <a class="btn-mycart" href="<?php echo base_url('cart') ?>" title="View my cart">Xem giỏ hàng</a>
                                                    <a href="<?php echo site_url('order/checkout') ?>" title="Checkout" class="btn-checkout">Thanh toán</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>