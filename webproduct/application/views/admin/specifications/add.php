<!-- head -->
<?php $this->load->view('admin/specifications/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
    
	   	<!-- Form -->
		<form enctype="multipart/form-data" method="post" action="<?php echo admin_url('specifications/add')?>" id="form" class="form">
			<fieldset>
				<div class="widget">
				    <div class="title">
						<img class="titleIcon" src="<?php echo public_url('admin')?>/images/icons/dark/add.png">
						<h6>Thêm mới Sản phẩm</h6>
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
				<?php foreach ($catalogs as $row):?>
           		  <option value="<?php echo $row->id?>"><?php echo $row->name?></option>
           		<?php endforeach;?>
		</select>
		<span class="autocheck" name="catalog_autocheck"></span>
		<div class="clear error" name="catalog_error"></div>
	</div>
	<div class="clear"></div>
</div>



<div class="formRow">
	<label for="param_field1" class="formLeft">
		Trường số 1 :
	</label>
	<div class="formRight">
		<span class="oneFour"><input type="text" id="param_field1" name="field1"></span>
		<span class="autocheck" name="field1_autocheck"></span>
		<div class="clear error" name="field1_error"></div>
	</div>
	<div class="clear"></div>
</div>

<script>
	$(document).ready(function() {
		var max_fields      = 20;
		var wrapper         = $("#tab1"); 
		var add_button      = $("#addField"); 
		
		var x = 1; 
		$(add_button).click(function(e){ 
			e.preventDefault();
			if(x < max_fields){ 
				x++; 
				$(wrapper).append('<div class="formRow"><label for="param_field'+x+'" class="formLeft">'
					+'Trường số '+x+':'
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


	        		</div><!-- End tab_container-->
	        		<center><div id="addField" style="width: 150px; padding: 5px; background-color: rgb(126, 209, 83); border: 2px solid #dfa; cursor: pointer;">Thêm thuộc tính</div></center>
	        		<div class="formSubmit">
	           			<input type="submit" class="redB" value="Thêm mới">
	           			<input type="reset" class="basic" value="Hủy bỏ">
	           		</div>
	        		<div class="clear"></div>
				</div>
			</fieldset>
		</form>
</div>
<div class="clear mt30"></div>
