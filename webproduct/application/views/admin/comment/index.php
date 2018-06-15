
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
			<thead>
				<tr>
				    <td style="width:70px;">STT</td>
					<td class="">Sản phẩm</td>
					<td class="">Tên người bình luận</td>
					<td class="">Nội dung</td>
					<td>Thời gian bình luận</td>
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
					
					<td><?php echo $row->content; ?></td>
					<td><?php echo get_date_time($row->created); ?></td>
					
					<td class="option">
						
						<a href="<?php echo base_url('product/view/'.$row->product_id.'/'.changeName($row->product->name))?>" title="<?php echo lang('edit'); ?>" class="tipS">
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
        