<!DOCTYPE html>
<html>
     <head>
        <title>{$SITE_DETAILS.title} - master.serwery-go.pl</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Minecraft, Counter-Strike, Metin2 - th7.eu - tu liczy się jakość!">
        <meta name="keywords" content="Minecraft, Counter-Strike, Metin2, th7nder, th7">
        <meta charset="UTF-8">
         
          <!-- CSS -->
          <link href="{$STATIC_URL}/css/bootstrap.min.css" rel="stylesheet" media="screen">
          <link href="{$STATIC_URL}/css/calendar.min.css" rel="stylesheet">
          <link href="{$STATIC_URL}/css/icomoon.min.css" rel="stylesheet">
          <link href="{$STATIC_URL}/css/media-player.min.css" rel="stylesheet">
          <link href="{$STATIC_URL}/css/file-manager.min.css" rel="stylesheet">
          <link href="{$STATIC_URL}/css/form.min.css" rel="stylesheet">
          <link href="{$STATIC_URL}/css/style.min.css" rel="stylesheet">
		  <link href="{$STATIC_URL}/css/custom.css" rel="stylesheet">
		  
		  <script src="{$STATIC_URL}/js/jquery-1.10.2.min.js"></script>
          <script src="{$STATIC_URL}/js/jquery-ui-1.10.3.min.js"></script>
		  <script src="{$STATIC_URL}/js/bootstrap.min.js"></script>
    </head>
    <body>
          <!-- Header -->
          <header id="header" class="clearfix">
               <!-- Logo -->
               <a href="{$SITE_URL}" class="logo shadowed">
                    Administration Daemon
               </a>
               
               <div class="dropdown profile-menu shadowed">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <img src="{$STATIC_URL}/img/profile-pics/profile-pic.png" alt="" class="profile-pic">
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
								<a {if $SITE_DETAILS.tpl eq "home"}class="active"{/if} href="{$SITE_URL}"><i class="icon-home"></i>Strona Główna</a>
							</li>
							<li>
								<a {if $SITE_DETAILS.tpl eq "admins"}class="active"{/if} href="{$SITE_URL}/?p=admins"><i class="icon-tree"></i>Zarządzanie Adminami</a>
							</li>
							<li>
								<a {if $SITE_DETAILS.tpl eq "adverts"}class="active"{/if} href="{$SITE_URL}/?p=adverts"><i class="icon-library"></i>Zarządzanie Reklamami</a>
							</li>
							<li>
								<a {if $SITE_DETAILS.tpl eq "bans"}class="active"{/if} href="{$SITE_URL}/?p=bans"><i class="icon-lock"></i>Zarządzanie Banami</a>
							</li>
							<li>
								<a {if $SITE_DETAILS.tpl eq "shop"}class="active"{/if} href="{$SITE_URL}/?p=shop"><i class="icon-gift"></i>Zarządzanie Sklepem</a>
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
			   {include file='_messages.tpl'}