<div style="width: 36px;">
<div style="width: 16px; float: left;">
<?php if ($Category->hasPrevSibling()): ?>
<?php echo link_to(image_tag('/sfPropelPlugin/images/desc.png'), '@move_news_category_up?category_id='. $Category->getId(), 'style="font-weight: bold; color: #666666"'); ?>
<?php else: ?>
&nbsp;
<?php endif; ?>
</div> 
<div style="width: 16px; float: right;">
<?php if ($Category->hasNextSibling()): ?>
<?php echo link_to(image_tag('/sfPropelPlugin/images/asc.png'), '@move_news_category_down?category_id='. $Category->getId(), 'style="font-weight: bold; color: #666666"'); ?>
<?php else: ?>
&nbsp;
<?php endif; ?>
</div>
</div> 
  