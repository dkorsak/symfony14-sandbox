<div style="width: 36px;">
<div style="width: 16px; float: left;">
<?php if ($Navigation->hasPrevSibling()): ?>
<?php echo link_to(image_tag('/sfPropelPlugin/images/desc.png'), '@move_navigation_up?id='. $Navigation->getId(), 'style="font-weight: bold; color: #666666"'); ?>
<?php else: ?>
&nbsp;
<?php endif; ?>
</div> 
<div style="width: 16px; float: right;">
<?php if ($Navigation->hasNextSibling()): ?>
<?php echo link_to(image_tag('/sfPropelPlugin/images/asc.png'), '@move_navigation_down?id='. $Navigation->getId(), 'style="font-weight: bold; color: #666666"'); ?>
<?php else: ?>
&nbsp;
<?php endif; ?>
</div>
</div> 
  