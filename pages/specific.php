<?php

$site_details = Array("title" => "Specific Data", "tpl" => "specific");

$smarty->assign("ADMIN_SPECIFIC", Game::getSpecificData(str_replace("/", "", $_GET['admin_id'])));