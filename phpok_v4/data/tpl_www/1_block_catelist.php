<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><dl class="sub_nav">
	<dt><?php echo $page_rs['title'];?></dt>
	<?php $list=phpok('_catelist',array('pid'=>$page_rs['id'],'cateid'=>$page_rs['cate']));?>
	<?php $list_sublist_id["num"] = 0;$list['sublist']=is_array($list['sublist']) ? $list['sublist'] : array();$list_sublist_id["total"] = count($list['sublist']);$list_sublist_id["index"] = -1;foreach($list['sublist'] AS $key=>$value){ $list_sublist_id["num"]++;$list_sublist_id["index"]++; ?>
	<dd<?php if($cate_rs['id'] == $value['id']){ ?> class="on"<?php } ?>><a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></a></dd>
	<?php } ?>
</dl>