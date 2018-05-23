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
                    <style>
                        table td{
                            padding:10px;
                            border:1px solid #f0f0f0;
                        }
                    </style>
                    <div class="box-center"> 
                        <div>
                            <h2>Thông tin thành viên</h2>
                            <hr />
                        </div>
                        <div class="box-content-center product">
                            <table style="width: 100%">
                                <tr>
                                    <td><strong>Họ tên</strong></td>
                                    <td><?php echo $user->name ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td><?php echo $user->email ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Số điện thoại</strong></td>
                                    <td><?php echo $user->phone ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Địa chỉ</strong></td>
                                    <td><?php echo $user->address ?></td>
                                </tr>
                            </table>
                        </div>
                        <div style="margin-top: 35px">
                                <a class="btn-primary" href="<?php echo site_url('user/edit') ?>" class="button">Sửa thông tin</a>
                            <a class="btn-primary" href="<?php echo site_url('user/order_history') ?>">Lịch sử giao dịch</a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
