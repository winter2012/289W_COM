<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>'message','do'=>$_GET['do']));?><div class="layout-main"><div id="breadclumb" class="box"><h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php echo lang('guestbook');?></h3></div><div id="CooperationMain" class="box clear-fix"><div class="layout-block-header"><h2><?php echo lang('guestbook');?></h2></div><div class="ui-table"><div class="ui-table-body ui-table-body-hover"><table cellpadding="0" cellspacing="0" width="100%" ><thead><tr class="ui-table-head"><th class="ui-table-hcell ui-table-hcell-sort" width="30"><?php echo lang('id');?></th><th class="ui-table-hcell ui-table-hcell-sort" width="180"><?php echo lang('email');?></th><th class="ui-table-hcell ui-table-hcell-sort"><?php echo lang('content');?></th><th class="ui-table-hcell ui-table-hcell-sort" width="120"><?php echo lang('ip');?></th><th class="ui-table-hcell ui-table-hcell-sort" width="120"><?php echo lang('time');?></th><th class="ui-table-hcell ui-table-hcell-sort" width="100"><?php echo lang('action');?></th></tr></thead><tbody><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row-<?php echo ($vo["id"]); ?>"><td><?php echo ($vo["id"]); ?></td><td><?php echo ($vo["email"]); ?></td><td><?php echo ($vo["content"]); ?></td><td><?php echo ($vo["add_ip"]); ?></td><td><?php echo (date("Y-m-d H:i:s",$vo["add_time"])); ?></td><td class="action"><q onclick="javascript:Delete('<?php echo ($vo["id"]); ?>','<?php echo U('Extend/proccess/',array('do'=>'delete','module'=>'Message','id'=>$vo['id']));?>')"><?php echo lang('delete');?></q></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></tbody></table></div></div><div class="ui-pager-bar"><div class="ui-pager"><?php echo ($page); ?></div></div></div><!--.box--><script type="text/javascript">function categoryEdit(id){
	id = id || 0;
	var title = id?"<?php echo lang('edit_category');?>":"<?php echo lang('add_category');?>";
	var url = "__APP__/Category/edit/tables/<?php echo ($_GET['tables']); ?>/type/<?php echo ($_GET['type']); ?>/id/"+id;
	$.open(url,{title:title,width:470,height:220})
}
</script><?php echo W("Foot");?>