<!DOCTYPE html>
<html lang="pl">
<head>
<?php include_http_metas() ?>
<?php include_metas_no_title() ?>
<?php include_title() ?>
<?php include_stylesheets() ?>
<?php include_javascripts() ?>
<!--[if lt IE 7]><script type="text/javascript" src="/js/unitpngfix.js"></script><![endif]-->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div id="main">
    <div id="top">
        <div id="header"><?php //echo link_to(image_tag('/images/admin/logo.jpg','alt="Comgroup" width="98" height="79"'), '@sf_guard_signin') ?>
            <p><?php echo sfConfig::get('application_name')?></p><div class="clear"></div>
        </div>
    </div>
    <div id="content" style="width: 1020px; margin-right: auto;margin-left: auto;">
        <div class="box_logowanie">
            <?php echo $sf_content ?>
        </div>
    </div>
</div>
</body>
</html>