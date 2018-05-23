
<div id="box-content">
    <div class="container">
        <div class="row">
            <div class="row">


                <div class="box-center col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="block-layout" style="margin-top: 0"><!-- The box-center news-->
                        <div class="box-content-center news"><!-- The box-content-center -->

                            <div class="tittle-box-center">
                                <h1>Liên hệ</h1>
                            </div>
                            <div class="box-content-center contact"><!-- The box-content-center -->
                                <form class="t-form form_action" method="POST" action="">

                                    <div class="form-row">
                                        <label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
                                        <div class="form-item">
                                            <input type="text" class="input" id="name" name="name" value="<?php echo set_value('name') ?>">
                                            <div class="clear"></div>
                                            <div class="error" id="name_error"><?php echo form_error('name') ?></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="form-row">
                                        <label for="param_email" class="form-label">Email:<span class="req">*</span></label>
                                        <div class="form-item">
                                            <input type="text" class="input" id="email" name="email" value="<?php echo set_value('email') ?>">
                                            <div class="clear"></div>
                                            <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="form-row">
                                        <label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
                                        <div class="form-item">
                                            <input type="text" class="input" id="phone" name="phone" value="<?php echo set_value('phone') ?>">
                                            <div class="clear"></div>
                                            <div class="error" id="phone_error"><?php echo form_error('phone') ?></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="form-row">
                                        <label for="param_address" class="form-label">Địa chỉ:<span class="req">*</span></label>
                                        <div class="form-item">
                                            <textarea  class="input" id="address" name="address"><?php echo set_value('address') ?></textarea>
                                            <div class="clear"></div>
                                            <div class="error" id="address_error"><?php echo form_error('address') ?></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>


                                    <div class="form-row">
                                        <label for="param_title" class="form-label">Tiêu đề liên hệ:<span class="req">*</span></label>
                                        <div class="form-item">
                                            <input type="text" class="input" id="title" name="title" value="<?php echo set_value('title') ?>">
                                            <div class="clear"></div>
                                            <div class="error" id="title_error"><?php echo form_error('title') ?></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="form-row">
                                        <label for="param_address" class="form-label">Nội dung liên hệ:<span class="req">*</span></label>
                                        <div class="form-item">
                                            <textarea  class="input" id="content" name="content"><?php echo set_value('content') ?></textarea>
                                            <div class="clear"></div>
                                            <div class="error" id="content_error"><?php echo form_error('content') ?></div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>


                                    <div class="form-row">
                                        <label class="form-label">&nbsp;</label>
                                        <div class="form-item">
                                            <input type="submit" class="button" value="Liên hệ" name='submit'>
                                            <div class="load"></div>
                                        </div>
                                    </div>
                                </form>
                                <div class='clear'></div>
                                <div id='content_contact'>

                                </div>

                            </div><!-- End box-content-center contact-->
                        </div>
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