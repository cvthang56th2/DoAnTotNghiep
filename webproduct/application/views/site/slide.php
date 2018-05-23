<div class="sliderhome7"  id="sliderhome7" style="margin-bottom: 40px;">
    <div class="wrap-item">
        <?php foreach ($slide_list as $row): ?>
            <div class="item" style="width: 100%">
                <a href="<?php echo $row->link ?>" target='_blank'>
                    <img width="100%" class="img-responsive" src="<?php echo base_url('upload/slide/' . $row->image_link) ?>" alt="<?php echo $row->name ?>"/> 
                </a>
            </div>
        <?php endforeach; ?>

    </div>
    <div class="navslider">
        <a href="#" class="prev">Prev</a>
        <a href="#" class="next">Next</a>
    </div>
    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            $('#sliderhome7 .wrap-item').slick();
            setInterval(function () {
                $('#sliderhome7 .navslider .next').click();
            }, 5000);

            $('#sliderhome7 .navslider .prev').on('click', function (e) {
               
                $('#sliderhome7 .slick-prev').click();
            });
            $('#sliderhome7 .navslider .next').on('click', function (e) {
                $('#sliderhome7 .slick-next').click();
            });
        });
    </script>
</div>