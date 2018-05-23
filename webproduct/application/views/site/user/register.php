


<div id="box-content">
    <div class="container">
        <div class="row">
            <div class="row">
                <?php $this->load->view('site/left'); ?>
                <div class="box-center col-lg-9 col-md-9 col-sm-7 col-xs-7">
                    <div class="box-center"><!-- The box-center product-->
                        <div>
                            <h2>Đăng ký thành viên</h2>
                            <hr />
                        </div>
                        <div class="box-content-center product"><!-- The box-content-center -->
                            <div style="text-align: center;">
                                <img width="20%" src="<?php echo public_url('site/images/' . 'register.png'); ?>" />
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <div style="width: 60%;border: 1px solid #ccc; border-radius: 10px; padding: 20px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                                    <form class="t-form form_action" method="post" action="<?php echo site_url('user/register') ?>" enctype="multipart/form-data">
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
                                            <label for="param_re_password" class="form-label">Gõ lại mật khẩu:<span class="req">*</span></label>
                                            <input type="password" class="form-control" id="re_password" name="re_password">
                                            <div class="error" id="re_password_error"><?php echo form_error('re_password') ?></div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name') ?>">
                                                <div class="error" id="name_error"><?php echo form_error('name') ?></div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone') ?>">
                                                <div class="error" id="phone_error"><?php echo form_error('phone') ?></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="param_name" class="form-label">Ảnh đại diện:</label>
                                            <input type="file" name="image" id="image" size="25">
                                            <div class="clear error" name="image_error"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="param_address" class="form-label">Địa chỉ:<span class="req">*</span></label>
                                            <textarea class="form-control" id="address" name="address"><?php echo set_value('address') ?></textarea>
                                            <div class="error" id="address_error"><?php echo form_error('address') ?></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">&nbsp;</label>
                                            <input type="submit" class="btn-primary" value="Đăng ký ngay" name="submit">
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