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
        <div id="header">
            <?php //echo link_to(image_tag('/images/admin/logo.jpg', 'alt="Comgroup" width="98" height="79"'), '@homepage') ?>
            <p><?php echo sfConfig::get('application_name')?></p><div class="clear"></div>
        </div>
    </div>
    <div id="login">
        <div id="login_center">
            <p><span>jesteś zalogowany jako:</span> 
            <?php echo $sf_user->getFullName() ?> &nbsp;| 
            &nbsp;<?php echo link_to("wyloguj", '@sf_guard_signout'); ?>
            </p>
            <div class="clear"></div>
        </div>
    </div>
    <div id="content" style="width: auto%; margin-left: 10px; margin-right: 10px;">
        <div id="left">
            <ul>
                <li><a href="javascript:void(0)">Menu</a>
                <ul><?php $nav = get_slot('nav') ?>
                <li <?php echo $nav=='navigaton' ? 'class="select"' : '' ?>><?php echo link_to("Nawigacja", '@navigation'); ?></li>
                <li <?php echo $nav=='category' ? 'class="select"' : '' ?>><?php echo link_to("Kategorie", '@category'); ?></li>
                <li <?php echo $nav=='article' ? 'class="select"' : '' ?>><?php echo link_to("Artykuły", '@article'); ?></li>
                <li <?php echo $nav=='static_page' ? 'class="select"' : '' ?>><?php echo link_to("Strony statyczne", '@static_page'); ?></li>
                <li <?php echo $nav=='site_config' ? 'class="select"' : '' ?>><?php echo link_to("Parametry konfiguracyjne", '@site_config_edit?id=1'); ?></li>
                <?php if ($sf_user->isAdmin()): ?>
                <li <?php echo $nav=='users' ? 'class="select"' : '' ?>><?php echo link_to("Użytkownicy", '@sf_guard_user'); ?></li>
                <?php else: ?>
                <li <?php echo $nav=='users' ? 'class="select"' : '' ?>><?php echo link_to("Moje konto", '@account_edit?id='.$sf_user->getAttribute('user_id', '', 'sfGuardSecurityUser')); ?></li>
                <?php endif; ?>
                </ul>
                </li>
            </ul>
        </div>
        <div id="right">
            <?php echo $sf_content ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
var w = jQuery("body").width() - 20 - 244;
jQuery('#right').width(w);
</script>
</body>
</html>