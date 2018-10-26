<?php

$site_details = Array("title" => "Shop", "tpl" => "shop");





if(isset($_POST['id_curr']) && isset($_POST['codename_curr']) && isset($_POST['service_name_curr']) && isset($_POST['display_name_curr']) && isset($_POST['description_curr'])){
  Shop::modifyService($_POST['id_curr'], $_POST['service_name_curr'], $_POST['display_name_curr'], $_POST['description_curr']);
}


$smarty->assign("LOGS", Shop::getLogs());
$smarty->assign("SERVERS", Shop::getServers());
$smarty->assign("SERVICES", Shop::getServices('codmod'));
/*
- Modele Postaci:<br>
1. Chucky<br>
2. Rocket Raccoon<br>
3. Batman<br>
4. Octodad<br>
5. Primetime Draven<br>
6. Rayman<br>
7. Lara Croft<br>

*/
