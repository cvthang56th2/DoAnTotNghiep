<div class="box-menu col-lg-3 col-md-3 col-sm-5 col-xs-5">
    <div class="wrap-vertical-menu">
        <div class="box-vertical-menu">
            <div class="vertical-menu">
                <div class="title">
                    <a href="#">
                        <span class="subtitle">Danh mục sản phẩm</span>
                    </a>
                </div>
                <ul class="catalog-main">
                    <?php foreach ($catalog_list as $row): ?>
                    <li class="catalog-main-li">
                        <span>
                            <a href="<?php echo base_url('product/catalog/' . $row->id) ?>" title="<?php echo $row->name ?>">
                                <?php echo $row->name ?>
                            </a>
                        </span>
                        <?php if (!empty($row->subs)): ?>
                        <!-- lay danh sach danh muc con -->
                        <ul class="catalog-sub">
                            <?php foreach ($row->subs as $sub): ?>
                            <li>
                                <a href="<?php echo base_url('product/catalog/' . $sub->id) ?>" title="<?php echo $sub->name ?>">
                                    <?php echo $sub->name ?>
                                </a>
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
    <div class="block " style="margin-top: 30px">
        <div class="title">
            <span>Quảng cáo</span>
        </div>
        <div class="wrap-banner-07" style="margin-top: 0">
            <?php foreach($advertment as $row): ?>
            <div style="background: rgb(232, 233, 230)">
                <img width="100%" src="<?php echo base_url('upload/advertment/'.$row->image_link); ?>" alt="" class="img-responsive" />
                <div class="info">
                    <h2 style="color: rgb(121, 87, 14)">
                        <?php echo $row->name; ?>
                    </h2>
                    <a class="btn-shopnow" href="<?php echo $row->link; ?>">
                        <span>Xem chi tiết</span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
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
                            <div class="pro-title product-name">
                                <a href="<?php echo base_url('product/view/' . $row->id) ?>">
                                    <?php echo $row->name ?>
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
                            </div>
                        </div>
                        <p>Lượt xem:
                            <b>
                                <?php echo $row->view ?>
                            </b>
                        </p>

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