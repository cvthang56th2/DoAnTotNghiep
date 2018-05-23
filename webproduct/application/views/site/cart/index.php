<div id="box-content">
    <div class="container">
        <div class="row">
            <div class="row">
                <?php $this->load->view('site/left'); ?>
                
                <div class="box-center col-lg-9 col-md-9 col-sm-7 col-xs-7">
                    <style>table#cart_ccontents td{padding:10px;border:1px solid #ccc}</style>

                    <div class="box-center"><!-- The box-center product-->
                        <div class="tittle-box-center">
                            <h2>Thông tin giỏ hàng (Có <?php echo $total_items ?> sản phẩm)</h2>
                            <hr />
                        </div>
                        <div class="box-content-center product"><!-- The box-content-center -->
                            <?php if ($total_items > 0): ?>
                                <form action="<?php echo base_url('cart/update') ?>" method="post">
                                    <table id="cart_ccontents" class="table table-hover">
                                        <thead>
                                        <th>Sản phẩm</th>
                                        <th>Giá bán</th>
                                        <th>Số lượng</th>
                                        <th>Tổng số</th>
                                        <th>Xóa</th>
                                        </thead>
                                        <tbody>
                                            <?php $total_amount = 0; ?>
                                            <?php foreach ($carts as $row): ?>
                                                <?php $total_amount = $total_amount + $row['subtotal']; ?>
                                                <tr>
                                                    <td>
                                            <center>
                                                <a href="<?php echo base_url('product/view/' . $row['id']) ?>">
                                                    <img width="20%" alt="Product demo" src="<?php echo base_url('upload/product/' . $row['image_link']) ?>" class="first_image img-responsive" />
                                                </a>
                                                <strong>
                                                    <a href="<?php echo base_url('product/view/' . $row['id']) ?>"><?php echo $row['name']; ?></a>
                                                </strong>
                                            </center>
                                            </td>
                                            <td>
                                                <?php echo number_format($row['price']); ?>đ
                                            </td>
                                            <td>
                                                <input type="number" name="qty_<?php echo $row['id'] ?>" value="<?php echo $row['qty']; ?>" min="1" class="form-control"/>
                                            </td>
                                            <td>
                                                <?php echo number_format($row['subtotal']); ?>đ
                                            </td>
                                            <td><a href="<?php echo base_url('cart/del/' . $row['id']) ?>">Xóa</a></td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <tr>
                                            <td colspan="5">
                                                Tổng số tiền thanh toán: <b style="color:red"><?php echo number_format($total_amount) ?>đ</b>
                                                - <a href="<?php echo base_url('cart/del') ?>" style="text-decoration: underline;">Xóa toàn bộ</a>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary">Cập nhât</button>

                                    <a class="btn-primary" href="<?php echo site_url('order/checkout') ?>" class="button">Mua hàng</a>
                                </form>
                            <?php else: ?>
                                <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>