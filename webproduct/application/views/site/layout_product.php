<html>
    <head>
        <title>YoloShop | <?php echo $product->name ?></title>
        <meta name="keywords" content="<?php echo $product->name.','.$product->meta_key; ?>"/>
        <meta name="description" content="<?php echo $product->meta_desc; ?>"/>
        <meta property='og:url' content='/product/view/<?php echo $product->id.'/'.changeName($product->name); ?>' />
        <meta property='og:type' content='product' />
        <meta property='og:title' content='<?php echo $product->name ?>'/>
        <meta property='og:description' content='<?php echo $product->meta_desc; ?>'/>
        <meta property='og:image' content='/upload/product/<?php echo $product->image_link; ?>'/>

        <?php $this->load->view('site/head'); ?>
        <?php $this->load->view('site/head_product'); ?>
        
    </head>
    <body class="product-view home07">
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