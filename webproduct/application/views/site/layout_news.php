<html>
    <head>
        <title>YoloShop | <?php echo $info->title ?></title>
        <meta name="keywords" content="<?php echo $info->title.','.$info->meta_key; ?>"/>
        <meta name="description" content="<?php echo $info->meta_desc; ?>"/>
        <meta property='og:url' content='/news/view/<?php echo $info->id.'/'.changeName($info->title); ?>' />
        <meta property='og:type' content='news' />
        <meta property='og:title' content='<?php echo $info->title ?>'/>
        <meta property='og:description' content='<?php echo $info->meta_desc; ?>'/>
        <meta property='og:image' content='/upload/news/<?php echo $info->image_link; ?>'/>
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