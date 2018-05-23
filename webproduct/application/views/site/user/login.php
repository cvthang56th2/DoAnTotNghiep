
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
                <div class="box-center col-lg-9 col-md-9 col-sm-7 col-xs-7">

                    <div class="box-center">
                        <div>
                            <h2>Đăng nhập</h2>
                            <hr />
                        </div>
                        <div class="box-content-center product">
                            <form class="t-form form_action" method="post" action="<?php echo site_url('user/login') ?>" enctype="multipart/form-data">
                                <h3 style="color:red"><?php echo form_error('login') ?></h3>
                                <div class="form-group">
                                    <label for="param_email" class="form-label">Email:<span class="req">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>">
                                    <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="param_password" class="form-label">Mật khẩu:<span class="req">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <div class="error" id="password_error"><?php echo form_error('password') ?></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">&nbsp;</label>
                                    <input type="submit" class="btn-primary" value="Đăng nhập" name="submit">
                                    <a href="<?php echo site_url('user/register') ?>" class="btn-primary">Đăng ký</a>

                                </div>
                            </form>
                            <div class="clear"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>