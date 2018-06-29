<div class="topNav">
	<div class="wrapper">
		<div class="welcome">
			<span>Xin chào: <b>admin!</b></span>
			<span class="wrap-noti">
			
</span>
		</div>
		
		
		<div class="userNav">
			<ul>

				<li><a target="_blank" href="<?php echo base_url()?>">
					<img src="<?php echo public_url('admin')?>/images/icons/light/home.png" style="margin-top:7px;">
					<span>Trang chủ</span>
				</a></li>
				
				<!-- Logout -->
				<li><a href="<?php echo admin_url('admin/logout')?>">
					<img alt="" src="<?php echo public_url('admin')?>/images/icons/topnav/logout.png">
					<span>Đăng xuất</span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="wrap-notification">
			<div id="noti-icon"><i class="fas fa-bell"></i> <span id="noti-count">0</span></div>
			<div style="width: 40%;">
					<div id="noti-content">
							<div class="noti"><p>Không có thông báo mới!</p></div>
						</div>
			</div>
			
		</div>

		<div class="clear"></div>
	</div>
</div>
<script>
	function load_unseen_notification()
		{
			
			$.ajax({
				url:"<?php echo admin_url('order/get_list_order'); ?>",
				method:"POST",
				dataType:"json",
				success:function(res) {
					var count = res.count;
					if (res.count) {
						$('#noti-content').html('');
						$('#noti-content').append('<div class="noti" style="background: #42e8f4"><strong>Đơn đặt hàng</strong></div>');
						res.list.map(function(e) {
							var html = '<div class="noti"><div onclick="gotoOrder();" style="cursor: pointer;"><p>Đơn hàng: <strong>'+e.transaction_id+'</strong> - Mặt hàng: <strong>' 
							+e.product_name+'</strong><br />Số lượng: <strong>'+e.qty+'</strong> - Tổng cộng: <strong>'
							+e.amount+' đ</strong></p></div><input type="checkbox" onclick="seen('
							+e.transaction_id+')" /> - Đánh dấu là đã đọc</div>';
							$('#noti-content').append(html);
						})
					} else {
						$('#noti-count').html('0');
						$('#noti-content').html('');
						$('#noti-content').append('<div class="noti"><p>Không có thông báo mới!</p></div>');
					}
					
					$.ajax({
						url:"<?php echo admin_url('comment/get_list_comment'); ?>",
						method:"POST",
						dataType:"json",
						success:function(res1) {
							$('#noti-content').append('<div class="noti" style="background: #42e8f4"><strong>Bình luận</strong></div>');
							if (res1.count) {
								count += res1.count
								res1.list.map(function(e) {
									var html = '<div class="noti"><div onclick="gotoComment('+e.id+');" style="cursor: pointer;">Sản phẩm: <strong>'+e.product.name+
									'</strong><br />Người bình luận: ' +e.user_name+'<br />Nội dung: '
									+e.content.substring(0, 100)+'...<br /><input type="checkbox" onclick="seenComment('
									+e.id+')" /> - Đánh dấu là đã đọc</div>';
									$('#noti-content').append(html);
								})
							} else {
								$('#noti-count').html('0');
								$('#noti-content').append('<div class="noti"><p>Không có thông báo mới!</p></div>');
							}
							$('#noti-count').html(count);
						}
					});

				}
			});
		}
		
		$('#noti-icon').toggle(function() {
			$('#noti-content').addClass('show');
		}, function() {
			$('#noti-content').removeClass('show');
		});
	$(document).ready(function() {
		load_unseen_notification();
		
			setInterval(function(){
				load_unseen_notification();;
			}, 5000);
	});
	function seen(data) {
		$.ajax({
			url: "<?php echo admin_url('order/update_seen');?>",
			data: {transaction_id: data},
			success: function() {
				load_unseen_notification();
			}
		});
	}

	function seenComment(data) {
		$.ajax({
			url: "<?php echo admin_url('comment/update_seen');?>",
			data: {comment_id: data},
			success: function() {
				load_unseen_notification();
			}
		});
	}

	function gotoOrder(){
		window.location.replace("<?php echo admin_url('order?id=&status=0&created=&user=&transaction_status=&created_to='); ?>");
	}

	function gotoComment(id){
		window.location.replace("<?php echo admin_url('comment?name=&publish=&id='); ?>"+id);
	}
</script>