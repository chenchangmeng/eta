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

	<?php echo HTML::script('js/jquery.min.js'); ?>
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
		<div class="col-xs-10 column">	
			<ul class="breadcrumb">
				<li>
					<a href="javascript:void(0);">当前位置</a> 
				</li>
				<li>
					<a href="javascript:void(0);">内容管理</a> 
				</li>
				<li class="active">
					<?php echo $tagMenu;  ?>
				</li>
			</ul>	

			<div class="row clearfix">
				<div class="col-xs-8 column">
					<form class="navbar-form navbar-left navbar-custom"  role="search" action="javascript:searchCustomer()">
						<div class="form-group">
							 <label for="title" class="control-label">客户名称：</label>
							 <input type="hidden" name="tid" id="tid" value="<?php echo $tid; ?>" />
							 <input class="form-control search-input"  type="text" maxlength="32" name="name" id="name" />&nbsp;
							  <button type="submit" class="btn btn-primary" ><em class='glyphicon glyphicon-search'></em>查找</button>	
						</div>

					</form>

				</div>
				<div class="col-xs-4 column" >
					<div class="navbar-cus-a">
						<a href="<?php echo URL::to('customer/customer-add/' . $tid); ?>"  class="btn btn-primary btn-custom">
							<em class='glyphicon glyphicon-plus'></em>添加<?php echo $tagMenu;  ?>
						</a>
					</div>

				</div>
			</div>

			<div id="list_content_div">
				<table class="table">
					<thead>
						<tr>
							<th>
								客户名称
							</th>
							<th>
								Logo
							</th>
							<th>
								行业分类
							</th>
							<th>
								排序
							</th>
							
							<th>
								创建时间
							</th>
							<th>
								操作
							</th>
						</tr> 
					</thead>
					<tbody>
						<?php $i = 0; ?>
						<?php foreach($customerData as $value){ ?>
							<?php echo $i == 1 ? "<tr class='active'>" : "<tr>"; ?>	
								<td><a href="<?php if(isset($value->url) && $value->url){echo $value->url;}else{echo '#';} ?>"><?php echo $value->name; ?></a></td>
								<td>
									<?php if($value->customerUrl){ ?>
										<img src="<?php echo $value->customerUrl; ?>" width="80" height="40" alt="<?php echo $value->name; ?>" />
									<?php } ?>
								</td>
								<td><?php echo $value->typeName; ?></td>
								<td><?php echo $value->sort; ?></td>
								<td><?php echo $value->created_at; ?></td>
								<td>
									<a href="<?php echo URL::to('customer/customer-update/'.$value->id.'/'.$tid); ?>"><em class='glyphicon glyphicon-edit'></em>编辑</a>/
									<a href='javascript:void(0);' onclick="DeleteCustomer(<?php echo $value->id; ?>, <?php echo $value->tid; ?>)"><em class='glyphicon glyphicon-remove'></em>删除</a>
								</td>
								
							</tr>
							<?php $i = 1 - $i; ?>
						<?php }  ?>
					</tbody>
				</table>
			</div>
			<div id="page_div" class="table-page">
				<table class="">
					<tr>
						<td colspan="12" class="tr bn">
							<span id="page_statistics">
							当前<input type="text" class="table-page-input" onkeypress="pagelist.changePage(event)" id="page" maxlength="10" size="1" value="1" />页 共<?php echo $pages; ?>页, <?php echo $total; ?>条记录
							</span>&nbsp;&nbsp;
							<span id="page-link">
								<a href="javascript:pagelist.firstPage()">第一页</a>
								<a href="javascript:pagelist.lastPage()">上一页</a>
								<a href="javascript:pagelist.nextPage()">下一页</a>
								<a href="javascript:pagelist.endPage()">最末页</a>
								<select id="pageSize" class="table-page-select" onchange="pagelist.changePageSize(this.value)">
									<option value="10">10</option>
									<option value="20">20</option>
									<option value="30">30</option>
								</select>
							</span>
						</td>
					</tr>
				</table>
			</div>
			
		</div>
	</div>
	<!-- footer html-->
	<?php echo $footer; ?>
</div>
</body>
<script type="text/javascript"> 

pagelist.filter["page"] = 1; //当前页
pagelist.filter["tid"] = <?php echo $tid; ?>;; //当前分类
pagelist.pageCount = <?php echo $pages; ?>; //总页数

console.log(pagelist.pageCount);

pagelist.mUrl = "<?php echo URL::to('customer/customer-page'); ?>";

function searchCustomer(){
	pagelist.filter.name = $("#name").val();
	pagelist.filter.tid = $("#tid").val();
	pagelist.filter.page = 1;
	pagelist.loadPage();
}

//翻页回调函数
pagelist.pageCallback = function(data){
	//console.log(data);
	data = eval("("+ data +")");
	//console.log(data);
	document.getElementById("list_content_div").innerHTML = data.html;
	document.getElementById("page_statistics").innerHTML = '当前<input type="text"  class="table-page-input" onkeypress="pagelist.changePage(event)" id="page" maxlength="10" size="1" value="'+
	data.filter.page + '" />页 共' + data.page_count + '页, ' + data.result_counts + '条记录';

	//if (typeof data.filter == "object") {
		//pagelist.filter = data.filter;
		pagelist.pageCount = data.page_count;
	//}
	//console.log(pagelist.filter["page"]);
}

function trim(str){ //删除左右两端的空格    
     return str.replace(/(^\s*)|(\s*$)/g, "");    
} 

function DeleteCustomer(id, tid){
	if(confirm("确定要删除该客户吗？")){
		window.location.href = "<?php echo URL::to('customer/customer-delete/'); ?>/" + id + '/' + tid;
	}
}

</script>
</html>
