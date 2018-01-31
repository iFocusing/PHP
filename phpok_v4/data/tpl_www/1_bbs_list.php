<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><?php $title = ($cate_rs && $cate_rs['id'] != $page_rs['cate']) ? $cate_rs['title'].' - '.$page_rs['title'] : $page_rs['title'];?>
<?php $title=$title;?><?php $this->assign("title",$title); ?><?php $menutitle=$page_rs['title'];?><?php $this->assign("menutitle",$page_rs['title']); ?><?php $this->output("head","file"); ?>
<?php if($page_rs['banner']){ ?>
<div class="page_banner"><img src="<?php echo $page_rs['banner']['filename'];?>" width="980" alt="<?php echo $title;?>" /></div>
<?php } ?>
<?php include("/Users/huojingjing/Sites/phpok_v4/phpinc/bbs_list.php");?>

<div class="wrap mb10">
	<div class="bbsbox table_lc" style="border:0;">
		<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<th>标题</th>
			<th>发帖人</th>
			<th class="width84">查看次数</th>
			<th class="width95">最后操作时间</th>
		</tr>
		<?php $rslist_id["num"] = 0;$rslist=is_array($rslist) ? $rslist : array();$rslist_id["total"] = count($rslist);$rslist_id["index"] = -1;foreach($rslist AS $key=>$value){ $rslist_id["num"]++;$rslist_id["index"]++; ?>
		<tr>
			<td class="width715"><em class="bbs-icon <?php echo $value['_icon'];?>"></em><a href="<?php echo $value['url'];?>"><?php echo $value['title'];?></a></td>
			<td class="width84"><?php echo $value['_author'];?></td>
			<td class="width84"><?php echo $value['hits'];?></td>
			<td class="width95"><?php echo $value['_lastdate'];?></td>
		</tr>
		<?php } ?>
		</table>
	</div>
	<table width="100%">
	<tr>
		<td valign="top">
			<div style="margin-top:8px"><a href="<?php if($session['user_id']){ ?><?php echo phpok_url(array('ctrl'=>'post','id'=>$page_rs['identifier'],'cateid'=>$cate_rs['id']));?><?php } else { ?>javascript:alert('游客不支持发贴，请先登录');void(0);<?php } ?>" title="发新贴"><img src="tpl/www/images/bbs_post.png" alt="发新贴" /></a></div>
		</td>
		<td align="right" valign="top"><?php $style="border-top:0;";?><?php $this->assign("style","border-top:0;"); ?><?php $this->output("block_pagelist","file"); ?></td>
	</tr>
	</table>
</div>

<?php $this->output("foot","file"); ?>