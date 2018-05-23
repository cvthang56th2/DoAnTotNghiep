
<div id="box-content">
    <div class="container">
        <div class="row">
            <div class="row">
                <?php $this->load->view('site/left'); ?>
                <div class="box-center col-lg-9 col-md-9 col-sm-7 col-xs-7">

                    <div class="box-center">
                        <div>
                            <h2>Đăng nhập</h2>
                            <hr />
                        </div>
                        <div class="box-content-center product">
                            <div style="text-align: center;">
                                <img width="20%" src="<?php echo public_url('site/images/' . 'login.png'); ?>" />
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <div style="width: 60%;border: 1px solid #ccc; border-radius: 10px; padding: 20px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
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
                                            <a href="<?php echo site_url('user/register') ?>" class="btn-primary">Đăng ký ngay</a>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>