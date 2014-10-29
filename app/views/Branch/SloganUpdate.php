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
	<?php echo HTML::script('js/ajax.js'); ?>
	<?php echo HTML::script('js/page.js'); ?>
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
					<a href="javascript:void(0);">内容管理</a> 
				</li>
				<li class="active">
					名人名言修改
				</li>
			</ul>	

			<div class="row clearfix">
				<div class="col-md-7 column">
					
				</div>
				<div class="col-md-5 column" >
					
				</div>
			</div>
			<?php echo Form::open(array('url' => 'branch/slogan-update-data', 'method' => 'post', 'class'=>'form-horizontal', 'id'=>'slogan_update_form'));  ?>
			<input type="hidden" id="id" name="id" value="<?php echo $resultData[0]->id; ?>" />
				<div class="form-group">
					<label for="name" class="col-sm-2 control-label">姓名：</label>
					<div class="col-xs-7" id="name_mess">
						<input type="text" value="<?php echo $resultData[0]->name; ?>" class="form-control operate-form" maxlength="32" name="name" id="name" />
					</div>
				</div>

				<div class="form-group">
					<label for="sloganUrl" class="col-sm-2 control-label"></label>
					<input type="hidden"  name="sloganUrl" id="sloganUrl"  value="<?php echo $resultData[0]->sloganUrl; ?>">
					<div class="col-xs-7" id="real_name_mess">
						<div id="sloganDiv" class="row clearfix">
							<div  class="col-md-10 column">
								<div class="fieldset partner" id="fsUploadProgress">
									<span class="legend">Slogan Logo</span>
												<div class="progressWrapper" id="sloganUrlID" style="opacity: 1;"><div class="progressContainer blue"><a class="progressCancel" href="#" style="visibility: hidden;"> </a><div></div><div class="progressBarStatus"><img id="sloganUrlDivImg" src="<?php echo $resultData[0]->sloganUrl; ?>" height="80" width="180" alt=""></div><div class="progressBarComplete"></div></div></div>

								</div>
							</div>
							<div class="col-md-2 column" >
								<div style="margin-top:10px;margin-right:10px;"><span  id="spanButtonPlaceHolder"></span></div>
								
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="position" class="col-sm-2 control-label">职位：</label>
					<div class="col-xs-7" id="position_mess">
						<input type="text" value="<?php echo $resultData[0]->position; ?>" class="form-control operate-form" maxlength="50" name="position" id="position" />
					</div>
				</div>

				<div class="form-group">
					<label for="company" class="col-sm-2 control-label">公司：</label>
					<div class="col-xs-7" id="company_mess">
						<input type="text" value="<?php echo $resultData[0]->company; ?>" class="form-control operate-form" maxlength="50" name="company" id="company" />
					</div>
				</div>

				<div class="form-group">
					<label for="slogan" class="col-sm-2 control-label">名言：</label>
					<div class="col-xs-7" id="slogan_mess">
						<textarea name="slogan" id="slogan" class="form-control operate-form"><?php echo $resultData[0]->slogan; ?></textarea>
					</div>
				</div>

				


				<div class="form-group">
					<label for="sort" class="col-sm-2 control-label">排序：</label>
					<div class="col-xs-7" id="sort_mess">
						<input type="text" value="<?php echo $resultData[0]->sort; ?>" class="form-control operate-form" maxlength="3" name="sort" id="sort" />
					</div>
				</div>
												
				<div class="form-group">
					<div class="col-sm-offset-2 col-xs-5">
						 <button type="submit" class="btn btn-success custom-news-btn">修改</button>
					</div>
				</div>
			<?php echo Form::close();  ?>		
			
		</div>
	</div>
	<!-- footer html-->
	<?php echo $footer; ?>
</div>
<?php echo HTML::script('js/jquery-ui.min.js'); ?>


<?php echo HTML::script('js/swfupload/swfupload.js'); ?>

<?php echo HTML::script('js/swfupload/js/swfupload.queue.js'); ?>
<?php echo HTML::script('js/swfupload/js/fileprogress.js'); ?>
<?php echo HTML::script('js/swfupload/js/handlers.js'); ?>

<script type="text/javascript">
var swfu;

window.onload = function() {
	var settings = {
		flash_url : "<?php echo HTML::swf('js/swfupload/Flash/swfupload.swf'); ?>",
		//flash_url : "http://192.168.2.70/swf/demos/swfupload/swfupload.swf",
		upload_url: "<?php echo URL::to('branch/slogan-deal-img');  ?>",
		post_params: {"typeImg" : "sloganUrl"},
		file_size_limit : "1 MB",
		file_types : "*.jpg;*.png;*.gif;*.jpeg;",
		file_types_description : "All Files",
		file_upload_limit : 10,
		file_queue_limit : 10,
		custom_settings : {
			progressTarget : "fsUploadProgress",
			cancelButtonId : "btnCancel"
		},
		//debug: true,

		// Button settings
		//button_image_url: "http://192.168.2.70/swf/demos/simpledemo/images/TestImageNoText_65x29.png",
		button_image_url: "<?php echo HTML::imageUrl('js/swfupload/TestImageNoText_65x29.png'); ?>",
		button_width: "65",
		button_height: "29",
		button_placeholder_id: "spanButtonPlaceHolder",
		button_text: '<span class="theFont">上传</span>',
		button_text_style: ".theFont { font-size: 16; }",
		button_text_left_padding: 12,
		button_text_top_padding: 3,
		
		// The event handler functions are defined in handlers.js
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete	// Queue plugin event
	};

	swfu = new SWFUpload(settings);
}
</script>



<script type="text/javascript">
$("#slogan_update_form").validate({
	//debug:true,
	rules:{		
		name : {
			required : true,
			
		},
		slogan : {
			required: true
		},
		sort : {
			number: true
		}

		
		
	},
	messages:{
		name : {
			required : "请填写姓名"
		},
		slogan : {
			required: "请填写名言"
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