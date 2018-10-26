<?php
/* Smarty version 3.1.30-dev/52, created on 2016-03-11 00:35:59
  from "/srv/httpd/master.serwery-go.pl/templates/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_56e204dfc96f36_02407739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a430328e557e5b93640a903d607622b28487f104' => 
    array (
      0 => '/srv/httpd/master.serwery-go.pl/templates/login.tpl',
      1 => 1457281763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_messages.tpl' => 1,
  ),
),false)) {
function content_56e204dfc96f36_02407739 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['SITE_DETAILS']->value['title'];?>
 - master.serwery-go.pl</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Administration Daemon by th7">
        <meta name="keywords" content="th7nder,serwery,go,serwery-go">
        <meta charset="UTF-8">
       
        <!-- CSS -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/icomoon.min.css" rel="stylesheet">
        <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/style.min.css" rel="stylesheet">
    </head>
    
    <body> 
        <div class="lbox-horz"></div>
        <div class="lbox-vert">
            <a href="" class="icon-info ttips forgot-password" title="Problem&nbsp;Login?"></a>
        </div>

        <div class="login-box side-form">
            <form method="POST" class="form-validation">
                <div class="form-group">
                    <input type="text" name="login" class="input-sm validate[required,custom[email]] form-control" placeholder="Login" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="input-sm validate[required] form-control" placeholder="Hasło" required>
                </div>
                <input type="submit" class="btn btn-gr-gray btn-block btn-xs" value="Zaloguj">
            </form>
        </div>
		<div style="margin: 0 auto; width: 480px;"<?php $_smarty_tpl->_subTemplateRender("file:_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
		<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/js/jquery-1.10.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/js/jquery-ui-1.10.3.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    </body>
</html><?php }
}
