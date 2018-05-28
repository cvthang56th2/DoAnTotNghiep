<!-- video -->
<script type='text/javascript' src='<?php echo public_url() ?>/site/tivi/jwplayer.js'></script>
<script type='text/javascript'>
    jQuery('document').ready(function () {
        jwplayer('mediaspace').setup({
            'flashplayer': '<?php echo public_url() ?>/site/tivi/player.swf',
            'file': 'https://www.youtube.com/watch?v=zAEYQ6FDO5U',
            'controlbar': 'bottom',
            'width': '560',
            'height': '315',
        });
    })
</script>

<!-- Raty -->
<script type="text/javascript">
    $(document).ready(function () {
        //raty
        $('.raty_detailt').raty({
            score: function () {
                return $(this).attr('data-score');
            },
            half: true,
            click: function (score, evt) {
                var rate_count = $('.rate_count');
                var rate_count_total = rate_count.text();
                $.ajax({
                    url: '<?php echo site_url('product/raty') ?>',
                    type: 'POST',
                    data: {'id': '<?php echo $product->id ?>', 'score': score},
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.complete)
                        {
                            var total = parseInt(rate_count_total) + 1;
                            rate_count.html(parseInt(total));
                        }
                        alert(data.msg);
                    }
                });
            }
        });
    });
</script>
<!--End Raty -->

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
                        <strong><?php echo $catalog->name; ?></strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row">
                <div id="box-left" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="block block-newarrival" id="block-newarrival" style="border: 1px solid #ccc;">
                        <div class="title" style="background: #4e5159; width: 100%; color: #fff; font-size: 128.57%;line-height: 50px; text-align: center;">
                            <span>Sản phẩm mới</span>
                        </div>
                        <div class="content">
                            <?php foreach ($product_newest as $row): ?>
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
                        <div class="navslider" style="display: flex; justify-content: space-between;">
                            <a href="#" class="prev">Prev</a>
                            <a href="#" class="next">Next</a>
                        </div>
                        <script type="text/javascript">
                            setInterval(function () {
                                $('#block-newarrival .navslider .next').click();
                            }, 3000);
                            jQuery(document).ready(function ($) {
                                $('#block-newarrival div.content').owlCarousel({
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
                                            $('#block-newarrival .navslider').show();
                                        } else {
                                            $('#block-newarrival .navslider').hide();
                                        }
                                    }
                                    //scrollPerPage: true,
                                });
                                $('#block-newarrival .navslider .prev').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-newarrival div.content').trigger('owl.prev');
                                });
                                $('#block-newarrival .navslider .next').on('click', function (e) {
                                    e.preventDefault();
                                    $('#block-newarrival div.content').trigger('owl.next');
                                });
                            });
                            //]]>
                        </script>
                        <div class="wrap-viewall">
                            <div class="view-all"  style="background: #4e5159; width: 100%; font-size: 128.57%;line-height: 50px; text-align: center;">
                                <a style="color: #fff; " href="<?php echo base_url(); ?>">Tất cả sản phẩm mới <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="block box-banner">	
                        <div id="box-banner" class="carousel slide" data-ride="carousel" data-interval="1500"><ol class="carousel-indicators">
                                <li class="active" data-target="#box-banner" data-slide-to="0"></li>
                                <li data-target="#box-banner" data-slide-to="1" class=""></li>
                                <li data-target="#box-banner" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active"><a href="#"><img src="<?php echo public_url(); ?>/mello_theme/images/banner13.png" alt="banner"></a>
                                    <div class="std">
                                        <span class="t1">up to 45%</span>
                                        <span class="t2">Nokia Lumia 920</span>
                                        <span class="t3">At verov eos et accusamus et iusto ods un dignissimos ducimus qui blan ditiis prasixer esentium</span>
                                    </div>
                                    <a class="gt-shop" href="#">Shop Now</a>
                                </div>
                                <div class="item"><a href="#"><img src="<?php echo public_url(); ?>/mello_theme/images/banner14.png" alt="banner"></a>
                                    <div class="std">
                                        <span class="t1">up to 50%</span>
                                        <span class="t2">Nokia Lumia 920</span>
                                        <span class="t3">At verov eos et accusamus et iusto ods un dignissimos ducimus qui blan ditiis prasixer esentium</span>
                                    </div>
                                    <a class="gt-shop" href="#">Shop Now</a>

                                </div>
                                <div class="item"><a href="#"><img src="<?php echo public_url(); ?>/mello_theme/images/banner15.png" alt="banner"></a>
                                    <div class="std">
                                        <span class="t1">up to 80%</span>
                                        <span class="t2">Nokia Lumia 920</span>
                                        <span class="t3">At verov eos et accusamus et iusto ods un dignissimos ducimus qui blan ditiis prasixer esentium</span>
                                    </div>
                                    <a class="gt-shop" href="#">Shop Now</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-main">
                    <div class="product-essential">
                        <div class="wrap">
                            <form action="#" method="post" id="product_addtocart_form">
                                <div class="product-name">
                                    <h1><?php echo $product->name ?></h1>
                                    <div class="navslider">
                                        <a class="prev" href="#">prev</a>
                                        <a class="next" href="#">next</a>
                                    </div>

                                </div>
                                <div class="product-img-box">
                                    <div class="image-main">
                                        <img src="<?php echo base_url('upload/product/' . $product->image_link) ?>" alt="Product demo"> 
                                    </div>
                                    <div class="click-quick-view">&nbsp;</div>
                                    <div id="galary-image" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div role="listbox">
                                            <div class="item active">
                                                <div class="sub-item">
                                                    <img src="<?php echo base_url('upload/product/' . $product->image_link) ?>" alt="product demo">
                                                </div>
                                                <?php if (is_array($image_list)): ?>
                                                    <?php foreach ($image_list as $img): ?>
                                                        <div class="sub-item">
                                                            <img src="<?php echo base_url('upload/product/' . $img) ?>" alt="product demo">
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>


                                        </div>


                                    </div>

                                    <div class="image-quick-view no-display">

                                        <div class="content">
                                            <span class="close">x</span>
                                            <img src="<?php echo public_url(); ?>/mello_theme/images/product/larg/demo6.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-shop">

                                    <!--<div class="product-code"><label>Product code:</label></div>-->
                                    <div class="short-description">

                                        <div class="box-info-detail">
                                            <p class="availability in-stock">
                                                <span class="label">Availability:</span>
                                                <span class="value">In stock</span>
                                            </p>
                                            <div class="price-info">
                                                <div class="price-box" style="text-align:left">
                                                    <?php if ($product->discount > 0): ?>
                                                        <?php $price_new = $product->price - $product->discount; ?>
                                                        <span class="regular-price">
                                                            <span class="price"><?php echo number_format($price_new) ?> đ</span>
                                                        </span>
                                                        <p class="special-price">
                                                            <span class="price"><?php echo number_format($product->price) ?> đ</span>
                                                        </p>
                                                    <?php else: ?>
                                                        <span class="regular-price">
                                                            <span class="price"><?php echo number_format($product->price) ?> đ</span>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="product-options-bottom">
                                                <p class='option'>
                                                    Danh mục: 
                                                    <a href="<?php echo base_url('product/catalog/' . $catalog->id) ?>" title="<?php echo $catalog->name ?>">
                                                        <b><?php echo $catalog->name ?></b>    
                                                    </a>
                                                </p>
                                                <?php if ($product->warranty != ''): ?>
                                                    <p class='option'>
                                                        Bảo hành: <b><?php echo $product->warranty ?></b> 
                                                    </p>
                                                <?php endif; ?>

                                                <?php if ($product->gifts != ''): ?>
                                                    <p class='option'>
                                                        Tặng quà: <b><?php echo $product->gifts ?></b> 
                                                    </p>
                                                <?php endif; ?>

                                                Đánh giá &nbsp;
                                                <span class='raty_detailt' style = 'margin:5px' id='<?php echo $product->id ?>' data-score='<?php echo $product->raty ?>'></span> 
                                                | Tổng số: <b  class='rate_count'><?php echo $product->rate_count ?></b>
                                                <div class="add-to-box add-to-cart">
                                                    <div class="add-to-cart">
                                                        <div class="add-to-cart-buttons">
                                                            <a href="<?php echo base_url('cart/add/' . $product->id) ?>"><button type="button" title="Add to Cart" class="button btn-cart" ><span><span>Add to Cart</span></span></button></a>
                                                        </div>
                                                    </div>
                                                    <!--<span class="or"></span>-->
                                                </div>

                                            </div>
                                            <!--div class="product-options-bottom">
                                                    <div class="add-to-box add-to-cart">
                                                                                                                    </div>
                                                    </div-->    
                                        </div>
                                        <!-- end div .box-info-detail -->
                                    </div>
                                </div>
                            </form>
                            <div class='clear' style='height:10px'></div>
                            <div style="text-align: center;">
                                <!-- AddThis Button BEGIN -->
                                <script type="text/javascript">var switchTo5x = true;</script>
                                <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                <script type="text/javascript">stLight.options({publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                                <span class='st_facebook_hcount' displayText='Facebook'></span>
                                <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                                <span class='st_googleplus_hcount' displayText='Google +'></span>
                                <span class='st_twitter_hcount' displayText='Tweet'></span>
                                <!-- AddThis Button END -->
                            </div>

                            <table width="100%" cellspacing="0" cellpadding="3" border="0" class="tbsicons">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;" width="25%"><img alt="Phục vụ chu đáo" src="<?php echo public_url('site') ?>/images/icon-services.png"> <div>Phục vụ chu đáo</div></td>
                                        <td style="text-align: center;" width="25%"><img alt="Giao hàng đúng hẹn" src="<?php echo public_url('site') ?>/images/icon-shipping.png"><div>Giao hàng đúng hẹn</div></td>
                                        <td style="text-align: center;" width="25%"><img alt="Đổi hàng trong 24h" src="<?php echo public_url('site') ?>/images/icon-delivery.png"> <div>Đổi hàng trong 24h</div></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="tab-detail">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Chi tiết sản phẩm</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Video</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <?php echo $product->content ?>
                                        <!-- comment facebook -->
                                        <center>
                                            <div id="fb-root"></div>
                                            <script src="http://connect.facebook.net/en_US/all.js#appId=170796359666689&amp;xfbml=1"></script>
                                            <div class="fb-comments" data-href="<?php echo current_url() ?>" data-num-posts="5" data-width="550" data-colorscheme="light"></div>
                                        </center>  
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div id='mediaspace' style="margin:5px;"></div>
                                    </div>

                                </div>
                            </div>

                            <div id="upsell_pro" class="products-grid">
                                <div class="inner">
                                    <div class="title">
                                        <span>Sản phẩm liên quan</span>            
                                    </div>
                                    <div class="block  vt-slider vt-slider5  row">
                                        <div class="slider-inner">
                                            <div class="container-slider">
                                                <div class="products-grid">
                                                    <?php foreach ($relative_products as $row): ?>
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
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end item wrap -->
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="navslider">
                                                <a class="prev" href="#">Prev</a>
                                                <a class="next" href="#">Next</a>
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
    <!--end content-->
</div>

