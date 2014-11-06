<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>laravel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
	<?php echo HTML::style('css/bootstrap.css'); ?>
	<?php echo HTML::style('css/style.css'); ?>

	<?php echo HTML::style('css/theme-element.css'); ?>

	<?php echo HTML::style('css/jquery-ui.css'); ?>

	<?php echo HTML::script('js/jquery.min.js'); ?>
	<?php echo HTML::script('js/jquery.validate.js'); ?>
	<?php echo HTML::script('js/bootstrap.min.js'); ?>
	<?php echo HTML::script('js/scripts.js'); ?>
</head>

<body>
<div class="container">
	<!-- header html -->
	<?php echo $header; ?>

	<!-- body html -->
	<div class="row clearfix" style="margin-top:10px;">
		<!-- menu html -->
		<?php echo $menu; ?>

		<!-- content html -->
		<div class="col-md-10 column">	
			<ul class="breadcrumb">
				<li>
					<a href="javascript:void(0);">当前位置</a> 
				</li>
				<li>
					<a href="javascript:void(0);">产品和服务</a> 
				</li>
				<li class="active">
					软件添加
				</li>
			</ul>	

			<div class="row clearfix">
				<div class="col-md-7 column">
					
				</div>
				<div class="col-md-5 column" >
					
				</div>
			</div>
			<?php echo Form::open(array('url' => 'download/soft-add-data', 'method' => 'post', 'class'=>'form-horizontal', 'id'=>'soft_add_form'));  ?>
				<div class="form-group">
					<label for="softName" class="col-sm-2 control-label">软件名称<span class="asterisk-tip">*</span>：</label>
					<div class="col-xs-7" id="softName_mess">
						<input type="text" class="form-control operate-form"  maxlength="80" name="softName" id="softName" />
					</div>
				</div>
				<div class="form-group">
					<label for="softDownloadName" class="col-sm-2 control-label">文件名称：</label>
					<div class="col-xs-7" id="softDownloadName_mess">
						<select name="softDownloadName" id="softDownloadName" class="form-control operate-form">
									<option value="" >--请选择--</option>
									<?php foreach ($softFile as $key => $value) {
									?>
										<option value="<?php echo $value; ?>" ><?php echo $value; ?></option>
									<?php
									} ?>
								
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="infoName" class="col-sm-2 control-label">软件版本：</label>
					<div class="col-xs-7" id="infoName_mess">
						<input type="text" class="form-control operate-form" maxlength="10" name="softVersion" id="softVersion" />
					</div>
				</div>

				<div class="form-group">
					<label for="softType" class="col-sm-2 control-label">分类：</label>
					<div class="col-xs-7" id="softType_mess">
						<select name="softType" id="softType" class="form-control operate-form">
								<option value="" >--请选择--</option>
								<?php foreach ($softMenu as $key => $value) {
								?>
									<option value="<?php echo $value->tid; ?>" ><?php echo $value->path_level.$value->name; ?></option>
								<?php
								} ?>
								
						</select> 
					</div>
				</div>
				<div class="form-group">
					<label for="softPublishDate" class="col-sm-2 control-label">发布时间：</label>
					<div class="col-xs-7" id="softPublishDate_mess">
						<input type="text" class="form-control operate-form" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" name="softPublishDate" id="softPublishDate" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="sort" class="col-sm-2 control-label">排序：</label>
					<div class="col-xs-7" id="sort_mess">
						<input type="text" class="form-control operate-form" maxlength="3" name="sort" id="sort" >
					</div>
				</div>
					
				<div class="form-group">
					<div class="col-sm-offset-2 col-xs-5">
						 <button type="submit" class="btn btn-success custom-news-btn">添加</button>
					</div>
				</div>
			<?php echo Form::close();  ?>		
			
		</div>
	</div>
	<!-- footer html-->
	<?php echo $footer; ?>
</div>
<?php echo HTML::script('js/jquery-ui.min.js'); ?>

<script type="text/javascript">
$( "#softPublishDate" ).datepicker({
	inline: true,
	dateFormat : "yy-mm-dd"
});

$("#soft_add_form").validate({
	//debug:true,
	rules:{		
		softName : {
			required : true,
			
		},
		softDownloadName : {
			required : true,
			
		},
		softType : {
			required : true,
		},
		sort : {
			number: true
		}

		
		
	},
	messages:{
		softName : {
			required : "请填软件名称"
		},
		softDownloadName : {
			required : "请选择文件名称"
		},
		softType : {
			required : "请选择分类",
		},
		sort: {
			number: "请填写数字"
		}
	},
	errorClass : "error-message",
	errorPlacement: function(error, element) {  
	    error.insertAfter("#" + element.context.attributes.name.nodeValue + "_mess");
	    //console.log(element.context.attributes.name.nodeValue);
	}
});
</script>
</body>
</html>
