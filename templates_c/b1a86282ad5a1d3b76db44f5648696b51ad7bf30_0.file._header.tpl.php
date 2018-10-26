<?php
/* Smarty version 3.1.30-dev/52, created on 2016-03-13 21:09:43
  from "/srv/httpd/master.serwery-go.pl/templates/_header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/52',
  'unifunc' => 'content_56e5c9073f43e8_53822900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1a86282ad5a1d3b76db44f5648696b51ad7bf30' => 
    array (
      0 => '/srv/httpd/master.serwery-go.pl/templates/_header.tpl',
      1 => 1457899777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:_messages.tpl' => 1,
  ),
),false)) {
function content_56e5c9073f43e8_53822900 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
     <head>
        <title><?php echo $_smarty_tpl->tpl_vars['SITE_DETAILS']->value['title'];?>
 - master.serwery-go.pl</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Minecraft, Counter-Strike, Metin2 - th7.eu - tu liczy się jakość!">
        <meta name="keywords" content="Minecraft, Counter-Strike, Metin2, th7nder, th7">
        <meta charset="UTF-8">
         
          <!-- CSS -->
          <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/bootstrap.min.css" rel="stylesheet" media="screen">
          <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/calendar.min.css" rel="stylesheet">
          <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/icomoon.min.css" rel="stylesheet">
          <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/media-player.min.css" rel="stylesheet">
          <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/file-manager.min.css" rel="stylesheet">
          <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/form.min.css" rel="stylesheet">
          <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/style.min.css" rel="stylesheet">
		  <link href="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/css/custom.css" rel="stylesheet">
		  
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
    </head>
    <body>
          <!-- Header -->
          <header id="header" class="clearfix">
               <!-- Logo -->
               <a href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
" class="logo shadowed">
                    Administration Daemon
               </a>
               
               <div class="dropdown profile-menu shadowed">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <img src="<?php echo $_smarty_tpl->tpl_vars['STATIC_URL']->value;?>
/img/profile-pics/profile-pic.png" alt="" class="profile-pic">
                    </a>
                    <ul class="dropdown-menu pull-right text-right">
                         <li class="divider"></li>
                         <li><a href="/?p=logout">Wyloguj</a></li>
                    </ul>
               </div>
          </header>
          
          <section id="main" role="main">
               
               <!-- Left Sidebar -->
               <aside id="leftbar" class="pull-left">
                    <div class="sidebar-container">
                         <!-- Main Menu -->
                         <ul class="side-menu shadowed">
							<li>
								<a <?php if ($_smarty_tpl->tpl_vars['SITE_DETAILS']->value['tpl'] == "home") {?>class="active"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
"><i class="icon-home"></i>Strona Główna</a>
							</li>
							<li>
								<a <?php if ($_smarty_tpl->tpl_vars['SITE_DETAILS']->value['tpl'] == "admins") {?>class="active"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=admins"><i class="icon-tree"></i>Zarządzanie Adminami</a>
							</li>
							<li>
								<a <?php if ($_smarty_tpl->tpl_vars['SITE_DETAILS']->value['tpl'] == "adverts") {?>class="active"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=adverts"><i class="icon-library"></i>Zarządzanie Reklamami</a>
							</li>
							<li>
								<a <?php if ($_smarty_tpl->tpl_vars['SITE_DETAILS']->value['tpl'] == "bans") {?>class="active"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=bans"><i class="icon-lock"></i>Zarządzanie Banami</a>
							</li>
							<li>
								<a <?php if ($_smarty_tpl->tpl_vars['SITE_DETAILS']->value['tpl'] == "shop") {?>class="active"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['SITE_URL']->value;?>
/?p=shop"><i class="icon-gift"></i>Zarządzanie Sklepem</a>
							</li>
                         </ul>
                    </div>
                    <span id="leftbar-toggle" class="visible-xs sidebar-toggle">
                         <i class="icon-angle-right"></i>
                    </span>
               </aside>
               
               <!-- Right Sidebar -->
               <aside id="rightbar" class="pull-right">
                    <div class="sidebar-container">
                         <!-- Date + Clock -->
                         <div class="clock shadowed">
                              <div id="date"></div>
                              <div id="time">
                                   <span id="hours"></span>
                                   :
                                   <span id="min"></span>
                                   :
                                   <span id="sec"></span>
                              </div>
                         </div>
                         
                         <!-- Calendar -->
                         <div class="shadowed side-calendar">
                              <div id="sidebar-calendar"></div>
                         </div>
                         
                         <!-- Progress bar -->
                         <div class="shadowed side-progress">
                              <h3 class="title">Progress</h3>
                              <div class="side-border">
                                   master.serwery-go.pl
                                   <div class="progress">
                                        <a href="#" data-toggle="tooltip" title="60%" class="yellow progress-bar ttips" style="width: 60%;"> 
                                             <span class="sr-only">60% Complete</span>
                                        </a>
                                   </div>
                              </div>
                         </div>           
                    </div>
                    
                    <span id="rightbar-toggle" class="hidden-lg sidebar-toggle">
                         <i class="icon-angle-left"></i>
                    </span>
               </aside>
               
               <!-- Content -->
               <section id="content" class="container">
			   <?php $_smarty_tpl->_subTemplateRender("file:_messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
