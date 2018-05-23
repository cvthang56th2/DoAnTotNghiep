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
                    <?php $this->load->view('site/site_message'); ?>
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