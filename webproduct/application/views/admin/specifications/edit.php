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
                    <h6>Cập nhật Sản phẩm</h6>
                </div>

                <ul class="tabs">
                    <li class="activeTab"><a href="#tab1">Thông tin chung</a></li>
                 

                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1" style="display: block;">
                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="catalog"  class="left"  disabled >
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


                        <!-- warranty -->
                        <?php $specs = json_decode($spec->list_specifications); foreach($specs as $row): ?>
                            <div class="formRow">
                                <label for="param_warranty" class="formLeft">
                                    Bảo hành :
                                </label>
                                <div class="formRight">
                                    <span class="oneFour"><input type="text" id="param_warranty" name="warranty" value="<?php echo $row->name ?>"></span>
                                    <span class="autocheck" name="warranty_autocheck"></span>
                                    <div class="clear error" name="warranty_error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <?php endforeach;?>

                        <center><div id="addField" style="width: 150px; padding: 5px; background-color: rgb(126, 209, 83); border: 2px solid #dfa; cursor: pointer;">Thêm thuộc tính</div></center>

                        <script>
                            $(document).ready(function() {
                                var max_fields      = 20;
                                var wrapper         = $("#tab1"); 
                                var add_button      = $("#addField"); 
                                
                                var x = 0; 
                                $(add_button).click(function(e){ 
                                    e.preventDefault();
                                    if(x < max_fields){ 
                                        x++; 
                                        $(wrapper).append('<div class="formRow"><label for="param_field'+x+'" class="formLeft">'
                                            +'Tên trường thứ '+x+':'
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
                                    e.preventDefault(); $(this).parents('.formRow').remove(); x--;
                                })
                            });
                        </script>

                        <div class="formRow hide"></div>
                    </div>

                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Cập nhật">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>
<div class="clear mt30"></div>
