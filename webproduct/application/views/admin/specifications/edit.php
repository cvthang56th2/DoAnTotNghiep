<!-- head -->
<?php $this->load->view('admin/specifications/head', $this->data) ?>

<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url('admin') ?>/images/icons/dark/add.png">
                    <h6>Cập nhật thông số Sản phẩm</h6>
                </div>

                <ul class="tabs">
                    <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
                 

                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1" style="display: block;">
                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="catalog"  class="left" >
                                    <option value=""></option>
                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                    <?php foreach ($catalogs as $row): ?>
                                            <option value="<?php echo $row->id ?>" <?php if ($row->id == $spec->catalog_id) echo 'selected'; ?>><?php echo $row->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span class="autocheck" name="cat_autocheck"></span>
                                <div class="clear error" name="cat_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>



                        <?php $specs = json_decode($spec->list_specifications); $n = count($specs); 
                            $x = 1;
                        foreach($specs as $row): ?>
                            <div class="formRow">
                                <label for="param_field<?php echo $x;?>" class="formLeft">
                                    Trường thứ <?php echo $x;?>:
                                </label>
                                <div class="formRight">
                                    <span class="oneFour"><input type="text" id="param_field<?php echo $x;?>" name="field<?php echo $x;?>" value="<?php echo $row->name ?>"></span> <span class="delete">Xóa trường</span>'
                                    <span class="autocheck" name="field<?php echo $x;?>_autocheck"></span>
                                    <div class="clear error" name="field<?php echo $x; $x++;?>_error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?php endforeach; $x--; ?>



                        <div class="formRow hide"></div>
                    </div>
                    <center><div id="addField" style="width: 150px; padding: 5px; background-color: rgb(126, 209, 83); border: 2px solid #dfa; cursor: pointer;">Thêm thuộc tính</div></center>

                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Cập nhật">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                
                <script>
                            var deleteArray = [];
                            $(document).ready(function() {
                                var max_fields      = 20;
                                var wrapper         = $("#tab1"); 
                                var add_button      = $("#addField"); 
                                
                                var x = <?php echo $x; ?>; 
                                $(add_button).click(function(e){ 
                                    e.preventDefault();
                                    if(x < max_fields){ 
                                        x++; 
                                        $(wrapper).append('<div class="formRow"><label for="param_field'+x+'" class="formLeft">'
                                            +'Trường thứ '+x+':'
                                        +'</label>'
                                        +'<div class="formRight">'
                                            +'	<span class="oneFour"><input type="text" id="param_field'+x+'" name="field'+x+'"></span> <span class="delete">Xóa trường</span>'
                                            +'<span class="autocheck" name="field'+x+'_autocheck"></span>'
                                            +'<div class="clear error" name="field'+x+'_error"></div>'
                                            +'</div>'
                                            +'<div class="clear"></div>'
                                            +'</div>'); //add input box
                                    }
                                    else
                                    {
                                    alert('Không vượt quá 20 trường!')
                                    }
                                });
                                
                                $(wrapper).on("click",".delete", function(e){ 
                                    e.preventDefault(); 
                                    var valDelete = $(this).siblings('.oneFour').children('input').val();
                                    deleteArray.push(valDelete);
                                    $(this).parents('.formRow').remove(); x--;
                                    
                                })
                                var clickCount = 1;

                                $('.formSubmit input[type=submit]').click(function(e) {
                                    if (clickCount == 1) {
                                        e.preventDefault();
                                        var str = JSON.stringify(deleteArray);
                                        var catalog_id = $('.formRow select').val();
                                        $.ajax({
                                            url: '<?php echo admin_url("specifications/deleteColumn?deleteArray="); ?>'+str+'&catalog_id='+catalog_id
                                        })
                                    }
                                    clickCount++;
                                    
                                })
                            });
                        </script>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>
<div class="clear mt30"></div>
