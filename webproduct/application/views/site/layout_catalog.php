<html>
    <head>
        <?php $this->load->view('site/head'); ?>
        <?php $this->load->view('site/head_catalog'); ?>
    </head>
    <body class="category home07">
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
                        <h3 style="color:red"><?php echo $message ?></h3>
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