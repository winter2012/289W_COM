<?php if (!defined('THINK_PATH')) exit(); echo W("Main",array('module'=>MODULE_NAME,'action'=>ACTION_NAME,'do'=>$_GET['do']));?><div class="layout-main"><div id="breadclumb" class="box"><h3><strong><?php echo lang('breadclumb_colon');?></strong><?php echo lang(MODULE_NAME);?><span></span><?php echo lang('item_list');?></h3></div><div id="CooperationMain" class="box clear-fix"><div class="layout-block-header"><form action="__SELF__" method="get" id="searchform"><label><?php echo lang('search_colon');?></label><input type="text" name="keyword" value="<?php echo (trim($_GET['keyword'])); ?>" class="ui-text" autocomplete="off" size="40"><select name="tags_id" onchange="form.submit();"><option value="0"><?php echo lang('please_select_category');?></option><?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><option value="<?php echo ($li["tags_type_id"]); ?>" <?php if(($_GET["tags_id"]) == $li["tags_type_id"]): ?>selected="selected"<?php endif; ?>><?php if(($li["level"]) > "1"): ?>&nbsp; &nbsp;└─<?php endif; echo ($li["name"]); ?>(<?php echo ($li["count"]); ?>)</option><?php endforeach; endif; else: echo "" ;endif; ?></select><button type="submit" class="btn btn-ok"><?php echo lang('search');?></button><button type="submit" class="btn btn-ok"><?php echo lang('oneKeyTest');?></button><button type="submit" class="btn btn-ok"><?php echo lang('oneKeyDel');?></button><input type="hidden" name="orderby" id="orderby" value="<?php echo ($_GET["orderby"]); ?>" /><input type="hidden" name="sort" id="sort" value="<?php echo ($_GET["sort"]); ?>" /><input type="hidden" name="s" id="s" value="/Item/index" /></form></div><form action="<?php echo U('Item/deleteAll');?>" method="post" id="deleteform"><div class="ui-table"><div class="ui-table-body ui-table-body-hover"><table cellpadding="0" cellspacing="0" width="100%" ><thead><tr class="ui-table-head"><th class="ui-table-hcell" width="20"><input type="checkbox" id="check_box" onclick="$.Select.All(this,'id[]');" ></th><th class="ui-table-hcell" width="200"><?php echo lang('title');?></th><th class="ui-table-hcell"><?php echo lang('category');?></th><th class="ui-table-hcell"><?php echo lang('description');?></th><th class="ui-table-hcell" width="100"><?php echo lang('status');?></th><th class="ui-table-hcell"><?php echo lang('url');?></th><th class="ui-table-hcell <?php if(($_GET["orderby"]) == "click"): ?>ui-table-hcell-<?php if(($_GET["sort"]) == "asc"): ?>asc<?php else: ?>desc<?php endif; endif; ?>" onmouseover="$(this).addClass('ui-table-hcell-hover')" onmouseout="$(this).removeClass('ui-table-hcell-hover')" onclick="orderBy($(this),'click')" width="80"><?php echo lang('click');?><div class="ui-table-hsort"></div></th><th class="ui-table-hcell <?php if(($_GET["orderby"]) == "id"): ?>ui-table-hcell-<?php if(($_GET["sort"]) == "asc"): ?>asc<?php else: ?>desc<?php endif; endif; ?>" onmouseover="$(this).addClass('ui-table-hcell-hover')" onmouseout="$(this).removeClass('ui-table-hcell-hover')" onclick="orderBy($(this),'id')" width="80"><?php echo lang('time');?><div class="ui-table-hsort"></div></th><th class="ui-table-hcell" width="100"><?php echo lang('action');?></th></tr></thead><tbody><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="row-<?php echo ($vo["id"]); ?>"><td><input type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" onclick="$.Select.This(this);"></td><td><a href="<?php echo ($vo["url"]); ?>" class="tips" target="_blank" title="<b><?php echo ($vo["host"]); ?></b><?php if(!empty($vo["logo"])): ?><br><img src='__PUBLIC__/Uploads<?php echo ($vo["logo"]); ?>' /><?php endif; ?>"><?php echo ($vo["title"]); if(($vo["is_hot"]) == "1"): ?><img src="__PUBLIC__/Assets/img/hot.gif" /><?php endif; ?></a></td><td><?php if(is_array($vo["tags"])): $i = 0; $__LIST__ = $vo["tags"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tags): $mod = ($i % 2 );++$i; if(($i) != "1"): ?>、<?php endif; echo ($tags["name"]); endforeach; endif; else: echo "" ;endif; ?></td><td><?php echo ($vo["description"]); ?></td><td>通畅</td><!-- 阻塞 --><td><?php echo ($vo["url"]); ?></td><td><?php echo (intval($vo["click"])); ?></td><td><?php echo (date("Y-m-d",$vo["add_time"])); ?></td><td class="action"><a href="<?php echo U('Item/'.ACTION_NAME,array('do'=>'edit','id'=>$vo['id']));?>"><?php echo lang('edit');?></a> |
								<q onclick="javascript:Delete('<?php echo ($vo["id"]); ?>','<?php echo U('Item/proccess/',array('do'=>'delete','id'=>$vo['id']));?>')"><?php echo lang('delete');?></q></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></tbody></table></div></div><div class="ui-pager-bar clearfix" style="padding-left:10px;"><div class="float-left"><input type="checkbox" id="check_box" onclick="$.Select.All(this,'id[]');" >选择/反选 
				<input type="button" name="delete" value="批量删除" class="btn btn-ok" onclick="delConfirm()"></div><div class="ui-pager" style="float:right"><?php echo ($page); ?></div></div></form></div><!--.box--><link rel="stylesheet" href="__PUBLIC__/Assets/js/tips/tip-yellowsimple/tip-yellowsimple.css" type="text/css" /><script type="text/javascript" src="__PUBLIC__/Assets/js/tips/jquery.poshytip.min.js"></script><script type="text/javascript">$(function(){
	$('.tips').poshytip({
		className: 'tip-yellowsimple',
		alignTo: 'target',
		alignX: 'right',
		alignY: 'center',
		offsetX: 10,
		showTimeout: 100,
		allowTipHover: true
	});
});
function delConfirm(){
	$.confirm('是否要删除？',function(){ 
		$('#deleteform').submit();
	},true)
}
</script><?php echo W("Foot");?>