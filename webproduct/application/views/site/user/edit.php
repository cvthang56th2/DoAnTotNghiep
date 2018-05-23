

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
                        <strong>Thông tin thành viên</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="row">
                <div id="box-left" class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="wrap-user-img" style="display: flex; justify-content: center;">
                        <img src="<?php if ($user->image_link != NULL) echo base_url('upload/user/' . $user->image_link); else echo base_url('upload/user/'.'user_unknown.png'); ?>" width="50%">
                    </div>
                    <div class="user-name" style="text-align: center; font-size: 20px;"><?php echo $user->name ?></div>
                    <ul>
                        <li style="padding: 10px; text-align: center; border: 1px solid #ccc; background: #0092ef;">
                            <a style="color: #fff;" href="<?php echo site_url('user') ?>">Thông tin tài khoản</a>
                        </li>
                        <li style="padding: 10px; text-align: center; border: 1px solid #ccc;"><a href="<?php echo site_url('user/order_history') ?>">Lịch sử giao dịch</a></li>
                    </ul>

                </div>
                <div id="main" class="col-lg-9 col-md-9 col-sm-8 col-xs-12 col-main">

                    <div class="box-center"><!-- The box-center product-->
                        <div>
                            <h2>Chỉnh sửa thông tin thành viên</h2>
                            <hr/>
                        </div>
                        <div class="box-content-center product"><!-- The box-content-center -->
                            <form class="t-form form_action" method="post" action="<?php echo site_url('user/edit') ?>" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="param_email" class="form-label">Email:</label>
                                        <div class="form-item">
                                            <?php echo $user->email ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="param_name" class="form-label">Ảnh đại diện:</label>
                                        <input type="file" name="image" id="image" size="25">
                                        <img src="<?php echo base_url('upload/user/' . $user->image_link) ?>" style="width:100px;height:70px">
                                        <div class="clear error" name="image_error"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="param_password" >Mật khẩu:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <div class="clear"></div>
                                    <p>Nếu thay đổi mật khẩu thì nhập dữ liệu</p>
                                    <div class="error" id="password_error"><?php echo form_error('password') ?></div>
                                </div>

                                <div class="form-group">
                                    <label for="param_re_password" class="form-label">Gõ lại mật khẩu:</label>
                                    <input type="password" class="form-control" id="re_password" name="re_password">
                                    <div class="clear"></div>
                                    <div class="error" id="re_password_error"><?php echo form_error('re_password') ?></div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="param_name" class="form-label">Họ và tên:<span class="req">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->name ?>">
                                        <div class="clear"></div>
                                        <div class="error" id="name_error"><?php echo form_error('name') ?></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="param_phone" class="form-label">Số điện thoại:<span class="req">*</span></label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user->phone ?>">
                                        <div class="clear"></div>
                                        <div class="error" id="phone_error"><?php echo form_error('phone') ?></div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="param_address" class="form-label">Địa chỉ:<span class="req">*</span></label>
                                    <textarea class="form-control" id="address" name="address"><?php echo $user->address ?></textarea>
                                    <div class="error" id="address_error"><?php echo form_error('address') ?></div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">&nbsp;</label>
                                    <input type="submit" class="btn-primary" value="Chỉnh sửa thông tin" name="submit">
                                </div>
                            </form>
                            <div class="clear"></div>
                        </div><!-- End box-content-center -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
