<?php foreach ($items as $key => $item): ?><?php $text = $item->getText() ?>
<?php if ($key != count($items) - 1): ?><?php $text = "<span>".$item->getText()."</span>" ?><?php endif;?>
<?php echo link_to($text, $item->getUri(ESC_RAW), $key == 0 ? '' : 'class="more"') ?>
<?php endforeach ?>