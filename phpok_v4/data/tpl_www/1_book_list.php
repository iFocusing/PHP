<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title=$page_rs['title'];?><?php $this->assign("title",$page_rs['title']); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<?php if($page_rs['banner']){ ?>
<div class="page_banner"><img src="<?php echo $page_rs['banner']['filename'];?>" width="980" alt="<?php echo $title;?>" /></div>
<?php } ?>

<script type="text/javascript">
$(document).ready(function(){
	$("#book_post").submit(function(){
		//提交表单
		if(!$('#title').val())
		{
			alert("留言主题不能为空");
			return false;
		}
		if(!$('#fullname').val())
		{
			alert('留言人姓名不能为空');
			return false;
		}
		if(!$('#email').val())
		{
			alert('邮箱不能为空');
			return false;
		}
		if(!$('#content').val())
		{
			alert('留言内容不能为空');
			return false;
		}
		$(this).ajaxSubmit({
			'url':api_url('post','save'),
			'type':'post',
			'dataType':'json',
			'success':function(rs){
				if(rs.status == 'ok')
				{
					alert('您的留言信息已发布，请耐心等候管理员审核，感谢您的提交');
					$.phpok.reload();
				}
				else
				{
					alert(rs.content);
					$("#update_vcode").phpok_vcode();
					$("#_chkcode").val('');
					return false;
				}
			}
		});
		return false;
	});
});
</script>
<div class="wrap mb10">
	<div class="page_left">
		<dl class="sub_nav">
			<dt><?php echo $page_rs['title'];?></dt>
			<dd><a href="<?php echo $page_rs['url'];?>"><?php echo $page_rs['title'];?></a></dd>
		</dl>
		<?php $this->output("block_contactus","file"); ?>
	</div>
	<div class="page_right">
		<div class="page_right_title">
			<span class="breadcrumbs">
				您现在的位置：
				<a href="<?php echo $sys['url'];?>" title="<?php echo $config['title'];?>">首页</a>
				<span class="arrow">&nbsp;</span> <a href="<?php echo $page_rs['url'];?>" title="<?php echo $page_rs['title'];?>"><?php echo $page_rs['title'];?></a>
			</span>
			<?php echo $page_rs['title'];?>
		</div>
		<div class="book">
			<?php $listId["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$listId["total"] = count($rslist);$listId["index"] = -1;foreach($rslist AS $key=>$value){ $listId["num"]++;$listId["index"]++; ?>
			<dl>
				<dt><?php echo $value['title'];?><span class="extinfo"> <span class="who"><?php echo $value['fullname'];?></span> 发表于<?php echo time_format($value['dateline']);?></span></dt>
				<dd>
					<div class="message"><?php echo $value['content'];?></div>
					<?php if($value['adm_reply']){ ?>
					<div class="adm_reply"><?php echo $value['adm_reply'];?></div>
					<?php } ?>
				</dd>
			</dl>
			<?php } ?>
			<?php $this->output("block_pagelist","file"); ?>
			<dl id="post" class="mess">
				<dt>发布新留言</dt>
				<dd>
					<form method="post" id="book_post">
					<input type="hidden" name="id" id="id" value="<?php echo $page_rs['identifier'];?>" />
					<?php $list=phpok('_fields',array('pid'=>$page_rs['id'],'fields_format'=>"1",'in_title'=>"1"));?>
					<table width="100%">
					<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
					<?php if($value['identifier'] != 'adm_reply'){ ?>
					<tr>
						<td width="150px" align="right"><?php echo $value['title'];?>：</td>
						<td class="td"><?php echo $value['html'];?></td>
					</tr>
					<?php } ?>
					<?php } ?>
					<?php if($sys['is_vcode'] && function_exists("imagecreate")){ ?>
					<tr>
						<td align="right">验证码：</td>
						<td class="td">
							<table cellpadding="0" cellspacing="0" width="180px">
							<tr>
								<td><input type="text" name="_chkcode" id="_chkcode" class="vcode" /></td>
								<td align="right"><img src="" border="0" align="absmiddle" id="update_vcode" class="hand"></td>
							</tr>
							</table>
							<script type="text/javascript">
							$(document).ready(function(){
								$("#update_vcode").phpok_vcode();
								//更新点击时操作
								$("#update_vcode").click(function(){
									$(this).phpok_vcode();
								});
							});
							</script>
						</td>
					</tr>
					<?php } ?>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" value=" 提交 " class="submit" /></td>
					</tr>
					</table>
					</form>
				</dd>
			</dl>
		</div>
	</div>
	<div class="cl"></div>
</div>
<?php $this->output("foot","file"); ?>