<html>
    <head>
        <?php $this->load->view('site/head'); ?>
    </head>
    <body class="home07">
        <a id="back_to_top" href="#" style="display: none;">
            <img src="<?php echo public_url() ?>/site/images/top.png">
        </a>

        <div class="wraper">
            <div class="header">
                <?php $this->load->view('site/header') ?>
            </div>

            <div id="container">
                <div class="content">
                    <?php if (isset($message)): ?>
                        <?php
                        $message_type = $this->session->flashdata('message_type');
                        if ($message_type == 'warn'):
                            ?>
                            <div class="alert alert-warning alert-dismissible" style="margin-top: 10px">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Chú ý!</strong> <?php echo $message ?>
                            </div>
                        <?php elseif ($message_type == 'success'):
                            ?>
                            <div class="alert alert-success alert-dismissible" style="margin-top: 10px">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> <?php echo $message ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php $this->load->view($temp, $this->data); ?>
                </div>
            </div>
            <center style="margin-top: 30px">
                <img width="90%" src="<?php echo public_url() ?>/site/images/bank.png"> 
            </center>

            <div class="footer">
                <?php $this->load->view('site/footer'); ?>
            </div>

        </div>

    </body>
</html>