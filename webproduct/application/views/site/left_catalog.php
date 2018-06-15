<?php
$price_from_select = isset($price_from) ? intval($price_from) : 0;
$price_to_select = isset($price_to) ? intval($price_to) : 0;
?>
<div id="box-left" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <div class="block block-layered-nav">
        <div class="block-title-shop-by">
            <strong><span>Tìm kiếm theo giá</span></strong>
        </div>
        <div class="block-content" style="width: 100%;">
            <form class="t-form form_action" method="get" style="padding:10px" action="<?php echo site_url('product/search_price') ?>" name="search">

                <div style="display:flex; justify-content: center;">
                    <label for="param_price_from" class="form-label" style="width:70px">Giá từ:<span class="req">*</span></label>
                    <div class="form-item" style="width:90px">
                        <select class="input" id="price_from" name="price_from">
                            <?php for ($i = 0; $i <= 50000000; $i = $i + 1000000): ?>
                                <option <?php echo ($price_from_select == $i) ? 'selected' : '' ?> value="<?php echo $i ?>"><?php echo number_format($i) ?> đ</option>
                            <?php endfor; ?>		
                        </select>
                        <div class="clear"></div>
                        <div class="error" id="price_from_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="display:flex; justify-content: center;">
                    <label for="param_price_from" class="form-label" style="width:70px">Giá tới:<span class="req">*</span></label>
                    <div class="form-item" style="width:90px">
                        <select class="input" id="price_to" name="price_to">
                            <?php for ($i = 0; $i <= 50000000; $i = $i + 1000000): ?>
                                <option  <?php echo ($price_to_select == $i) ? 'selected' : '' ?>  value="<?php echo $i ?>"><?php echo number_format($i) ?> đ</option>
                            <?php endfor; ?>								          
                        </select>
                        <div class="clear"></div>
                        <div class="error" id="price_from_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div style="display:flex; justify-content: center;">
                    <label class="form-label">&nbsp;</label>
                    <div class="form-item">
                        <input class="button" name="search" value="Tìm kiềm" style="height:30px !important;line-height:30px !important;padding:0px 10px !important" type="submit">
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
        <div class="block-title">
            <strong><span>Danh mục sản phẩm</span></strong>
        </div>
        <div class="block-content">
            <dl id="narrow-by-list">
                <?php foreach ($catalog_list as $i => $row): ?>
                    <dt <?php echo 'id="tab' . ($i + 1) . '"'; ?> class="tab-accordion accordion-close"><span><?php echo $row->name ?></span></dt>
                    <dd <?php echo 'class="tabcontent' . ($i + 1) . '"'; ?> style="display:none;">
                        <?php if (!empty($row->subs)): ?>
                            <ol>
                                <?php foreach ($row->subs as $sub): ?>    					                    
                                    <li>
                                        <a href="<?php echo base_url('product/catalog/' . $sub->id.'/'.changeName($row->name).'/'.changeName($sub->name)) ?>" title="<?php echo $sub->name ?>"> 
                                            <?php echo $sub->name ?></a>
                                    </li>
                                <?php endforeach; ?>		 			                    
                            </ol>
                        <?php endif; ?>

                    </dd>
                <?php endforeach; ?>

            </dl>
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
                                <img width="100%" src="<?php echo base_url('upload/advertment/'.$row->image_link); ?>" alt="<?php echo $row->name; ?>" class="img-responsive" />
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