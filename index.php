<?php 
  require('functions.php');
  require('db.php');
  $dbInterface = new DBInterface();
  $routes = ['/' => ['main.php', 'layout'], '/web' => ['web.php','layout'], '/vacancy' => ['vacansii.php','layout'], '/polygraphy' => ['pechat.php', 'layout'], 
            '/orders' => ['admin/admin.php', 'admin'], '/order_types' => ['admin/create_order_type.php', 'admin']];
  $content = $routes[$_SERVER['REQUEST_URI']][0];
  $layout = $routes[$_SERVER['REQUEST_URI']][1];
  // debug([$content, $layout], true);
  require('layouts/'.$layout.'.php');
?>