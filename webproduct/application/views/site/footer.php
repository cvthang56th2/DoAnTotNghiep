<div id="box-footer">
    <div class="box-footer-middle">
        <div class="container">
            <div class="row">
                <div class="row" style=" padding-top: 30px">
                    <div class="block block-info col-lg-3 col-md-3 col-sm-3 col-xs-6" style="display: flex; align-items: center; justify-content: center;">
                        <img src="<?php echo public_url(); ?>site/images/YoloBlack.png" alt="Logo Yolo Shop" width="50%" />
                    </div>
                    <div class="block block-customer col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="block-title">
                            <span>Yolo Shop</span>
                        </div>
                        <div class="block-content">
                            <ul style="color: #fff">
                                <li>Địa chỉ: KTX K3 511 Đại học Nha Trang</li>
                                <li>Liên hệ
                                    <ul>
                                        <li>Số điện thoại: 01668844581</li>
                                        <li>Email: cvthang56th2@gmail.com</li>
                                        <li>Skype: Cao Viết Thắng</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="block block-galary col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="block-title">
                            <span>Mạng xã hội</span>
                        </div>
                        <ul id="footer-social">
                            <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube-square"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                        </ul>
                    </div>

                    <div class="block block-cu col-lg-3 col-md-3 col-sm-3 col-xs-6">
                        <div class="block-title">
                            <span>Liên kết nhanh</span>
                        </div>
                        <div class="block-content">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url('product'); ?>" style="color:#fff">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('news') ?>" style="color:#fff">Tin sức</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('contact') ?>" style="color:#fff">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a id="gototop" style="display: block;">Top</a>
    <!--js-->
</div>
<script>
    function addCart(id) {
    $.ajax({
                    url: "<?php echo base_url('cart/add_ajax/') ?>"+ id,
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
} 
</script>