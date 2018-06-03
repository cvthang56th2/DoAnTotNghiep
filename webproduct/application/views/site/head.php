<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/mello_theme/style/css/style-main07.css">
<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/mello_theme/config/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/site/css/opensansfont.css" media="all">
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/style/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo public_url() ?>/mello_theme/js/galary-image/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo public_url() ?>/mello_theme/js/galary-image/js/bootstrap-image-gallery.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/js/jquery.plugin.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/js/jquery.countdown.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/js/slideshow/jquery.themepunch.revolution.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/js/slideshow/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="<?php echo public_url() ?>/mello_theme/js/theme.js"></script> 
<!-- raty -->
<script type="text/javascript" src="<?php echo public_url() ?>/site/raty/jquery.raty.min.js"></script>
<script type="text/javascript">
    $(function () {
        $.fn.raty.defaults.path = '<?php echo public_url() ?>/site/raty/img';
        $('.raty').raty({
            score: function () {
                return $(this).attr('data-score');
            },
            readOnly: true,
        });
    });
</script>
<style>.raty img{width:16px !important;height:16px; !important;}</style>
<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/site/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo public_url() ?>/site/slick/slick-theme.css"/>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/site/slick/slick.min.js"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<!--End raty -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo public_url(); ?>site/images/YoloBlack.png" />
<title>Yolo Shop | Technology for Life</title>