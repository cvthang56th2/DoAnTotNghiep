
<!-- Common -->
<?php $this->load->view('admin/comment/_common'); ?>
<!-- Main content wrapper -->
<div class="wrapper">

	<!-- Static table -->
	<div class="widget">
	
		<div class="title">
			<img src="<?php echo public_url('admin'); ?>/images/icons/dark/frames.png" class="titleIcon" />
			<h6>Danh sách bình luận</h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
		<thead class="filter"><tr><td colspan="6">
                        <form method="get" action="<?php echo admin_url('comment') ?>" class="list_filter form">
                            <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                                    <tr>
                                        <td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
                                        <td class="item"><input type="text" style="width:55px;" id="filter_id" value="<?php echo $this->input->get('id') ?>" name="id"></td>

                                        <td style="width:40px;" class="label"><label for="filter_iname">Tên</label></td>
                                        <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name') ?>" name="name"></td>

                                        <td style="width:60px;" class="label"><label for="filter_status">Xuất bản</label></td>
                                        <td class="item">
                                            <select name="publish">
                                                <option value=""></option>
												<option value="0">Đang chờ duyệt</option>
												<option value="1">Xuất bản</option>
                                            </select>
                                        </td>

                                        <td style="width:150px">
                                            <input type="submit" value="Lọc" class="button blueB">
                                            <input type="reset" onclick="window.location.href = '<?php echo admin_url('product') ?>';" value="Reset" class="basic">
                                        </td>

                                    </tr>
                                </tbody></table>
                        </form>
                    </td></tr></thead>

            <thead>
			<thead>
				<tr>
				    <td style="width:70px;">STT</td>
					<td class="">Sản phẩm</td>
					<td class="">Tên người bình luận</td>
					<td class="">Nội dung</td>
					<td>Thời gian bình luận</td>
					<td>Trạng thái</td>
					<td style="width:100px;"><?php echo lang('action'); ?></td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($list as $row): ?>
				<tr class="row_<?php echo $row->id?>">
				    <td><?php echo $row->id; ?></td>
				    
					<td style="display: flex; align-items: center">
						<img src="<?php echo base_url('upload/product/'.$row->product->image_link); ?>" width="20%"/>
						&nbsp; &nbsp; <a href="<?php echo base_url('product/view/'.$row->product_id.'/'.changeName($row->product->name)); ?>" style="text-decoration: underline; color: #42a4f4">
						<?php echo $row->product->name; ?> 
						</a>
					</td>
					
					<td><?php echo $row->user_name; ?></td>
					
					<td><?php echo substr($row->content, 0, 40) . "..."; ?></td>
					<td><?php echo get_date_time($row->created); ?></td>
					<td class="textC"><?php 
					if ($row->publish == 1)
						echo '<span style="color: green" >Xuất bản</span>';
					else if ($row->publish == 0)
						echo '<span style="color: #42bcf4" >Đang chờ duyệt</span>';
					else
						echo '<span style="color: red" >Khác</span>';
					?></td>
					<td class="option">
						
						<a href="<?php echo admin_url('comment/edit/'.$row->id)?>" title="<?php echo lang('edit'); ?>" class="tipS">
							<img src="<?php echo public_url('admin') ?>/images/icons/color/view.png" />
						</a>
						
						<a href="<?php echo admin_url('comment/del/'.$row->id)?>" title="<?php echo lang('delete'); ?>" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
						</a>
						
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<div class="pagination">
                            <?php echo $this->pagination->create_links() ?>
                        </div>
	</div>
</div>
        