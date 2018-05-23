<?php $message = $this->session->flashdata('message');
if (isset($message)): ?>
    <?php
    $message_type = $this->session->flashdata('message_type');
    if ($message_type == 'warn'):
        ?>
        <div class="alert alert-warning alert-dismissible fade in" style="margin-top: 10px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Chú ý!</strong> <?php echo $message ?>
        </div>
    <?php elseif ($message_type == 'success'):
        ?>
        <div class="alert alert-success alert-dismissible fade in" style="margin-top: 10px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> <?php echo $message ?>
        </div>
    <?php elseif ($message_type == 'danger'): ?>
        <div class="alert alert-danger alert-dismissible fade in" style="margin-top: 10px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Danger!</strong> <?php echo $message ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
<script>
    $(document).ready(function () {
        setTimeout(function() {
            $('.alert .close').click();
        }, 3000);
    })

</script>