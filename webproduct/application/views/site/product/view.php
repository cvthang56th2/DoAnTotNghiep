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
                    data: { 'id': '<?php echo $product->id ?>', 'score': score },
                    dataType: 'json',
                    success: function (data) {
                        if (data.complete) {
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
                        <strong>
                            <?php echo $catalog->name; ?>
                        </strong>
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
                                            <img width="100%" alt="<?php echo $row->name; ?>" src="<?php echo base_url('upload/product/' . $row->image_link) ?>" class="first_image img-responsive">
                                        </a>
                                        <div class="item-btn">
                                            <div class="box-inner">

                                                <div class="right">

                                                    <a href="<?php echo base_url('cart/add/' . $row->id) ?>" class="btn-cart" title="Add to cart">
                                                        <i class="fas fa-cart-plus"></i> Thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-info">
                                        <div class="pro-inner">
                                            <div class="pro-title product-name">
                                                <a href="<?php echo base_url('product/view/' . $row->id) ?>">
                                                    <?php echo $row->name; ?>
                                                </a>
                                            </div>
                                            <div class="pro-content">
                                                <div class="wrap-price">
                                                    <div class="price-box">
                                                        <?php if ($row->discount > 0): ?>
                                                        <?php $price_new = $row->price - $row->discount; ?>
                                                        <span class="regular-price">
                                                            <span class="price">
                                                                <?php echo number_format($price_new) ?> đ</span>
                                                        </span>
                                                        <p class="special-price">
                                                            <span class="price">
                                                                <?php echo number_format($row->price) ?> đ</span>
                                                        </p>
                                                        <?php else: ?>
                                                        <span class="regular-price">
                                                            <span class="price">
                                                                <?php echo number_format($row->price) ?> đ</span>
                                                        </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="pro-content">
                                                    <center>
                                                        <div class='raty' style='margin:10px 0px' id='<?php echo $row->id ?>' data-score='<?php echo ($row->rate_count > 0) ? $row->rate_total / $row->rate_count : 0 ?>'></div>
                                                    </center>
                                                </div>
                                                <p style="text-align:center">Lượt xem:
                                                    <b>
                                                        <?php echo $row->view ?>
                                                    </b>
                                                </p>
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
                            <div class="view-all" style="background: #4e5159; width: 100%; font-size: 128.57%;line-height: 50px; text-align: center;">
                                <a style="color: #fff; " href="<?php echo base_url(); ?>">Tất cả sản phẩm mới
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="block box-banner">	
        <div id="box-banner" class="carousel slide" data-ride="carousel" data-interval="1500">
                        <div style="padding-left: 20px; background: #fafafa; width: 100%;border-bottom: 1px solid #ccc;">
                            <span style="line-height: 48px; font-size: 128.57%; text-transform: uppercase; color: #444; font-weight: 700;">Quảng cáo</span>
                        </div>
                        <div class="wrap-banner-07" style="margin-top: 0">
                            <?php foreach($advertment as $row): ?>
                            <div style="background: rgb(232, 233, 230)">
                                <img width="100%" src="<?php echo base_url('upload/advertment/'.$row->image_link); ?>" alt="" class="img-responsive" />
                                <div style="position: absolute;width: 100%;top: 0;padding-left: 30px;padding-top: 31px;">
                                    <h2 style="color: rgb(121, 87, 14)">
                                        <?php echo $row->name; ?>
                                    </h2>
                                    <a style="background: #fff;color: #666;top: 118px;left: 30px;padding: 7px 32px 7px 20px;" href="<?php echo $row->link; ?>">
                                        <span>Xem chi tiết</span>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <script>
                        $('document').ready(function () {
                            $('.wrap-banner-07').slick({
                                autoplay: true,
                                autoplaySpeed: 4000,
                                dots: true
                            });
                        })
                    </script>
        </div>
    </div>
                </div>
                <div id="main" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-main">
                    <div class="product-essential">
                        <div class="wrap">
                            <form action="#" method="post" id="product_addtocart_form">
                                <div class="product-name">
                                    <h1>
                                        <?php echo $product->name ?>
                                    </h1>
                                    

                                </div>
                                <div class="product-img-box">
                                    <div class="image-main">
                                        <img src="<?php echo base_url('upload/product/' . $product->image_link) ?>" alt="<?php echo $product->name; ?>">
                                    </div>
                                    <div class="click-quick-view">&nbsp;</div>
                                    <div id="galary-image" class="carousel slide" data-ride="carousel">
                                        <!-- Wrapper for slides -->
                                        <div role="listbox">
                                            <div class="item active">
                                                <div class="sub-item">
                                                    <img src="<?php echo base_url('upload/product/' . $product->image_link) ?>" alt="<?php echo $product->name; ?>">
                                                </div>
                                                <?php if (is_array($image_list)): ?>
                                                <?php foreach ($image_list as $img): ?>
                                                <div class="sub-item">
                                                    <img src="<?php echo base_url('upload/product/' . $img) ?>" alt="<?php echo $product->name; ?>">
                                                </div>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>


                                        </div>


                                    </div>

                                    <div class="image-quick-view no-display">

                                        <div class="content">
                                            <span class="close">x</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-shop">

                                    <!--<div class="product-code"><label>Product code:</label></div>-->
                                    <div class="short-description">

                                        <div class="box-info-detail">
                                            <p class="availability in-stock">
                                                <span class="label">Availability:
                                                    <?php 
                                                    if ($product->available_quantity <= 0) echo '<strong style="color:red;">Hết hàng</strong>';
                                                    else echo '<strong style="color:green;">Còn hàng</strong>';
                                                ?>
                                                </span>
                                            </p>
                                            <div class="price-info">
                                                <div class="price-box" style="text-align:left">
                                                    <?php if ($product->discount > 0): ?>
                                                    <?php $price_new = $product->price - $product->discount; ?>
                                                    <span class="regular-price">
                                                        <span class="price">
                                                            <?php echo number_format($price_new) ?> đ</span>
                                                    </span>
                                                    <p class="special-price">
                                                        <span class="price">
                                                            <?php echo number_format($product->price) ?> đ</span>
                                                    </p>
                                                    <?php else: ?>
                                                    <span class="regular-price">
                                                        <span class="price">
                                                            <?php echo number_format($product->price) ?> đ</span>
                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="product-options-bottom">
                                                <p class='option'>
                                                    Danh mục:
                                                    <a href="<?php echo base_url('product/catalog/' . $catalog->id) ?>" title="<?php echo $catalog->name ?>">
                                                        <b>
                                                            <?php echo $catalog->name ?>
                                                        </b>
                                                    </a>
                                                </p>
                                                <?php if ($product->warranty != ''): ?>
                                                <p class='option'>
                                                    Bảo hành:
                                                    <b>
                                                        <?php echo $product->warranty ?>
                                                    </b>
                                                </p>
                                                <?php endif; ?>

                                                <?php if ($product->gifts != ''): ?>
                                                <p class='option'>
                                                    Tặng quà:
                                                    <b>
                                                        <?php echo $product->gifts ?>
                                                    </b>
                                                </p>
                                                <?php endif; ?> Đánh giá &nbsp;
                                                <span class='raty_detailt' style='margin:5px' id='<?php echo $product->id ?>' data-score='<?php echo $product->raty ?>'></span>
                                                | Tổng số:
                                                <b class='rate_count'>
                                                    <?php echo $product->rate_count ?>
                                                </b>
                                                <div class="add-to-box add-to-cart">
                                                    <div class="add-to-cart">
                                                        <div class="add-to-cart-buttons">
                                                            
                                                                <button type="button" title="Add to Cart" class="button btn-cart" style="width: auto;">
                                                                    <span>
                                                                        <span>Thêm vào giỏ hàng</span>
                                                                    </span>
                                                                </button>
                                                                <script>
                                                                $('document').ready(function() {
                                                                    $('.btn-cart').click(function() {
                                                                        $.ajax({
                                                                            url: "<?php echo base_url('cart/add_ajax/' . $product->id) ?>",
                                                                        }).done(function(res) {
                                                                            if (res === "DA_CO_TRONG_GIO_HANG") {
                                                                                alert("Mặt hàng đã có trong giỏ hàng!");
                                                                            } else if (res === "KHONG_DU") {
                                                                                alert("Đã hết hàng!")
                                                                            } else {
                                                                                 var count_carts = parseInt($('#count_carts').html()) + 1;
                                                                                $('#count_carts').html(count_carts)
                                                                                var respon = JSON.parse(res);
                                                                                var html = '<li class="item row">'
                                                                                +'<a href="<?php echo base_url("product/view/") ?>'+respon.id+'" title="'+respon.name+'" class="product-image" style="width: 40%">'
                                                            +'<img width="100%" src="<?php echo base_url("upload/product/"); ?>'+respon.image_link+'" alt="'+respon.name+'"></a>'
                                                            + '<a href="<?php echo base_url("cart/del/") ?>'+respon.id+'" class="btn-remove">Remove This Item</a><div class="product-details"><p class="product-name">'
                                                            +'<a title="'+respon.name+'" href="<?php echo base_url("product/view/") ?>'+respon.id+'">'+respon.name+'</a></p><span class="price"><span class="regular-price">'
                                                                    +'<span class="price">'+respon.price+' đ</span></span></span><div class="qty-abc"><label>Số lượng: </label>'
                                                                +'<input value="'+respon.qty+'" type="text" name="qty_'+respon.id+'"></div></div>'
                                                                                +'</li>';

                                                                                $('#cart-sidebar').append(html);
                                                                                var total_carts = $('#total_carts').html();
                                                                                var number = Number(total_carts.replace(/[^0-9\.-]+/g,""));
                                                                                total_carts = number + respon.price*respon.qty;
                                                                                total_carts = total_carts.toFixed(0).replace(/./g, function(c, i, a) {
                                                                                    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
                                                                                });
                                                                                $('#total_carts').html(total_carts + " đ");
                                                                                alert("Thêm vào giỏ hàng thành công!");
                                                                            }
                                                                        })
                                                                    })
                                                                })
                                                                </script>
                                                            
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
                                <script type="text/javascript">stLight.options({ publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964", doNotHash: false, doNotCopy: false, hashAddressBar: false });</script>
                                <span class='st_facebook_hcount' displayText='Facebook'></span>
                                <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                                <span class='st_googleplus_hcount' displayText='Google +'></span>
                                <span class='st_twitter_hcount' displayText='Tweet'></span>
                                <!-- AddThis Button END -->
                            </div>

                            <table width="100%" cellspacing="0" cellpadding="3" border="0" class="tbsicons">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;" width="25%">
                                            <img alt="Phục vụ chu đáo" src="<?php echo public_url('site') ?>/images/icon-services.png">
                                            <div>Phục vụ chu đáo</div>
                                        </td>
                                        <td style="text-align: center;" width="25%">
                                            <img alt="Giao hàng đúng hẹn" src="<?php echo public_url('site') ?>/images/icon-shipping.png">
                                            <div>Giao hàng đúng hẹn</div>
                                        </td>
                                        <td style="text-align: center;" width="25%">
                                            <img alt="Đổi hàng trong 24h" src="<?php echo public_url('site') ?>/images/icon-delivery.png">
                                            <div>Đổi hàng trong 24h</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="tab-detail">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#home">Chi tiết sản phẩm</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#menu1">Bài viết về sản phẩm</a>
                                    </li>
                                </ul>

                                <div class="tab-content" style="height: 500px; overflow: scroll;">
                                    <div id="home" class="tab-pane fade in active">
                                        <?php echo $product->detail == '' ? 'Chưa có chi tiết về sản phẩm, chi tiết về sản phẩm sẽ được cập nhật sau...' : $product->detail ?>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <?php echo $product->content == '' ? 'Chưa có bài viết về sản phẩm, bài viết về sản phẩm sẽ được cập nhật sau...' : $product->content ?>
                                    </div>

                                </div>
                            </div>
                            <div>
                                <h3 style="font-size: 18px; color: #333; text-transform: uppercase; padding-bottom: 5px; border-bottom: 1px solid #ccc">Bình luận về sản phẩm:</h3>
                                <form class="t-form form_action" method="POST" action="<?php echo base_url() ?>product/add_comment/<?php echo $product->id ?>">
                                    <div class="form-group">
                                        <label for="param_user_name" class="form-label">Họ và tên:
                                            <span class="req">*</span>
                                        </label>
                                        <input type="text" class="form-control" id="user_name" name="user_name" value="<?php if (isset($user_info)) echo $user_info->name; ?>">
                		                <div class="clear error" name="user_name_error"><?php echo form_error('user_name')?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="param_content" class="form-label">Nội dung bình luận:
                                            <span class="req">*</span>
                                        </label>
                                        <textarea class="form-control" id="content" name="content"></textarea>
                                        <div class="clear error" name="content_error"><?php echo form_error('content')?></div>
                                    </div>

                                    <div class="form-group">
                                        <label for="param_user_name" class="form-label">Nhập captcha
                                            <span class="req">*</span>
                                        </label>
                                        <div style="margin-bottom: 10px">
                                            <div class="image" style="display: inline">
                                                <?php echo $captcha; ?>
                                            </div>

                                            <a class="refresh" href="javascript:;"><i class="fas fa-sync-alt"></i></a>
                                        </div>
                                        
                                        <input type="text" class="form-control" id="captcha" name="captcha" style="width: 25%">
                		                <div class="clear error" name="captcha_error"><?php echo form_error('captcha')?></div>
                                    </div>
                                    <script>
                                        $(function(){
                                            $('.refresh').click(function(){
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '<?php echo base_url() ?>/product/refresh_captcha',
                                                    success: function(res){
                                                        if(res){
                                                            $('.image').html(res);
                                                        }
                                                    }
                                                })
                                            });
                                        });
                                    </script>

                                    <div class="form-group">
                                        <label class="form-label">&nbsp;</label>
                                        <input type="submit" class="btn-primary" value="Bình luận" name='submit'>
                                        <div class="load"></div>
                                    </div>
                                </form>
                                <div id="wrap-commet">
                                    <?php foreach($list_comment as $comment): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <strong><?php echo $comment->user_name; ?></strong>
                                            <span class="text-muted">/ <?php echo get_date_time($comment->created); ?></span>
                                        </div>
                                        <div class="panel-body">
                                            <?php echo $comment->content; ?>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                    <div class="pagination">
                                        <?php echo $this->pagination->create_links() ?>
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
                                                                    <div class="product-name">
                                                                        <a href="<?php echo base_url('product/view/' . $row->id) ?>">
                                                                            <?php echo $row->name; ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="pro-content">
                                                                        <div class="wrap-price">
                                                                            <div class="price-box">
                                                                                <?php if ($row->discount > 0): ?>
                                                                                <?php $price_new = $row->price - $row->discount; ?>
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <?php echo number_format($price_new) ?> đ</span>
                                                                                </span>
                                                                                <p class="special-price">
                                                                                    <span class="price">
                                                                                        <?php echo number_format($row->price) ?> đ</span>
                                                                                </p>
                                                                                <?php else: ?>
                                                                                <span class="regular-price">
                                                                                    <span class="price">
                                                                                        <?php echo number_format($row->price) ?> đ</span>
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