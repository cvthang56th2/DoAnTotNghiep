<!-- head -->
<?php $this->load->view('admin/comment/_common'); ?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Chỉnh sửa bình luận</h6>
		</div>

      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>
                <div class="formRow">
									<p>Tên người bình luận: <?php echo $info->user_name; ?></p>
									
								</div>
								<div class="formRow">
									<p>Nội dung bình luận: <?php echo $info->content; ?></p>
								</div>
                
								<div class="formRow">
									<p>Thời gian bình luận: <?php echo get_date_time($info->created); ?></p>
								</div>

                 <div class="formRow">
                	<label for="param_publish" class="formLeft">Xuất bản:</label>
                	<div class="formRight">
                		<span class="oneTwo">
                    		<select _autocheck="true" id="param_publish"  name="publish">
												<option value="0" <?php if ($info->publish == 0) echo "selected"; ?> >Đang chờ duyệt</option>
												<option value="1" <?php if ($info->publish == 1) echo "selected"; ?> >Xuất bản</option>
                    		</select>
                		</span>
                		<span class="autocheck" name="publish_autocheck"></span>
                		<div class="clear error" name="publish_error"><?php echo form_error('publish')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
                
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Cập nhật">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
