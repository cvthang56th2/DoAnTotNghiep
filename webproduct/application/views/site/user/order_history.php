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
                        <strong>Lịch sử giao dịch</strong>
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
                        <li style="padding: 10px; text-align: center; border: 1px solid #ccc;">
                            <a href="<?php echo site_url('user') ?>">Thông tin tài khoản</a>
                        </li>
                        <li style="padding: 10px; text-align: center; border: 1px solid #ccc; background: #0092ef;"><a style="color: #fff;" href="<?php echo site_url('user/order_history') ?>">Lịch sử giao dịch</a></li>
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
                            <h2><i class="fas fa-history"  style="color: #F7A922; font-size: 30px;"></i> Lịch sử giao dịch</h2>
                            <hr />
                        </div>
                        <div class="box-content-center product">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ngày tạo</th>
                                        <th>Sản phẩm</th>
                                        <th>Hình thức thanh toán</th>
                                        <th>Tình trạng</th>
                                        <th>Địa chỉ giao hàng</th>
                                        <th>Số tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user_transaction as $i => $row): ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo get_date($row->created) ?></td>
                                        <td>
                                            <?php
                                            foreach ($row->orders as $order) {
                                                echo '- ' . $order->product_name . ' - ' . $order->qty . ' sản phẩm<br />';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row->payment ?></td>
                                        <td>
                                            <?php
                                            if ($row->status == 0) {
                                                echo 'Chưa thanh toán';
                                            } elseif ($row->status == 1) {
                                                echo 'Đã thanh toán';
                                            } else {
                                                echo 'Thanh toán thất bại';
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row->message; ?></td>
                                        <td><?php echo number_format($row->amount); ?> đ</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                           
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
