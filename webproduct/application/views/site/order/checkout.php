<div id="box-content">
    <div class="container">
        <div class="row">
            <div class="row">
                <?php $this->load->view('site/left'); ?>
                <div class="box-center col-lg-9 col-md-9 col-sm-7 col-xs-7">

                    <div class="box-center"><!-- The box-center product-->
                        <div style="display: flex; flex-wrap: wrap;">
                            <img width="20%" height="70px" src="<?php echo public_url('site/images/' . 'payment.png'); ?>" />
                            <h2>Thông tin nhận hàng của thành viên</h2>
                        </div>
                        <hr />

                        <div class="box-content-center product"><!-- The box-content-center -->
                            <div style="display: flex; justify-content: center;">
                                <div style="width: 60%;border: 1px solid #ccc; border-radius: 10px; padding: 20px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <form class="t-form form_action" method="post" action="<?php echo site_url('order/checkout') ?>" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="param_email" class="form-label">Tổng số tiền thanh toán:</label>
                                            <b style="color:red"><?php echo number_format($total_amount) ?> đ</b>
                                        </div>

                                        <div class="form-group">
                                            <label for="param_email" class="form-label">Email:<span class="req">*</span></label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($user->email) ? $user->email : '' ?>">
                                            <div class="error" id="email_error"><?php echo form_error('email') ?></div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($user->name) ? $user->name : '' ?>">
                                                <div class="error" id="name_error"><?php echo form_error('name') ?></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo isset($user->phone) ? $user->phone : '' ?>">
                                                <div class="error" id="phone_error"><?php echo form_error('phone') ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="param_address" class="form-label">Ghi chú:<span class="req">*</span></label>
                                            <p>Nhập địa chỉ  và thời gian nhận hàng</p>
                                            <textarea class="form-control" id="message" name="message"></textarea>
                                            <div class="error" id="address_error"><?php echo form_error('message') ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="param_address" class="form-label">Thanh toán qua:<span class="req">*</span></label>
                                            <select name="payment" class="form-control">
                                                <option value="">---- Chọn cổng thanh toán -----</option>
                                                <option value="offline">Thanh toán khi nhận hàng</option>
                                                <option value="baokim">Bảo Kim</option>
                                                <option value="nganluong">Ngân lượng</option>

                                            </select>
                                            <div class="error" id="payment_error"><?php echo form_error('payment') ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">&nbsp;</label>
                                            <input type="submit" class="btn-primary" value="Thanh toán" name="submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- End box-content-center -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>