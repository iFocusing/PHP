<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><div class="foot">
	<div class="copyright">
		<?php $list = phpok('footnav');?>
		<?php $list_id["num"] = 0;$list=is_array($list) ? $list : array();$list_id["total"] = count($list);$list_id["index"] = -1;foreach($list AS $key=>$value){ $list_id["num"]++;$list_id["index"]++; ?>
		<a href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>" target="<?php echo $value['target'];?>"><?php echo $value['title'];?></a>
		<?php if($list_id['num'] == $list_id['total']){ ?><br /><?php } else { ?> | <?php } ?>
		<?php } ?>
		<?php echo $config['copyright']['content'];?>
		<div class="debug"><?php echo debug_time('1','1','1','1');?></div>
	</div>
</div>
<?php $list = phpok('kefu');?>
<?php if($list['project'] && $list['rslist']){ ?>
<div id="right-float-box" class="im_floatonline">
	<div class="float-box-content">
		<div class="toptitle"><?php echo $list['project']['title'];?></div>
		<div class="addlist">
			<ul>
				<?php $list_rslist_id["num"] = 0;$list['rslist']=is_array($list['rslist']) ? $list['rslist'] : array();$list_rslist_id["total"] = count($list['rslist']);$list_rslist_id["index"] = -1;foreach($list['rslist'] AS $key=>$value){ $list_rslist_id["num"]++;$list_rslist_id["index"]++; ?>
				<li><?php echo $value['title'];?><br><?php echo $value['code'];?></li>
				<?php } ?>
				<?php if($list['project']['barcode']){ ?>
				<li><img src="<?php echo $list['project']['barcode']['filename'];?>" width="80px" alt="<?php echo $list['project']['title'];?>" /></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
if($.browser.msie && parseInt($.browser.version, 10) < 7)
{
	$(document).ready(function(){
		 $(window).scroll(function(){
			 $("#right-float-box").css({top:$(this).scrollTop()+$(this).height()-500});
		 });
	});
}
</script>
<?php } ?>
</body>
</html>
