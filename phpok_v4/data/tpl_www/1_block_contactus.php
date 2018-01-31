<?php if(!defined("PHPOK_SET")){exit("<h1>Access Denied</h1>");} ?><dl class="page_contact">
	<dt>联系我们</dt>
	<dd>
		<?php if($config['contactus']['company']){ ?><b><?php echo $config['contactus']['company'];?></b><?php } ?>
		<?php if($config['contactus']['address']){ ?><div>地址：<?php echo $config['contactus']['address'];?></div><?php } ?>
		<?php if($config['contactus']['email']){ ?><div>Email：<?php echo $config['contactus']['email'];?></div><?php } ?>
		<?php if($config['contactus']['zipcode']){ ?><div>邮编：<?php echo $config['contactus']['zipcode'];?></div><?php } ?>
		<?php if($config['contactus']['tel']){ ?><div>电话：<?php echo $config['contactus']['tel'];?></div><?php } ?>
		<?php if($config['contactus']['fullname']){ ?><div>联系人：<?php echo $config['contactus']['fullname'];?></div><?php } ?>
	</dd>
</dl>