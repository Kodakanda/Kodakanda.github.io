<?php 
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
  require('functions.php');
  require('db.php');
  $dbInterface = new DBInterface();
  $routes = ['/' => ['main.php', 'layout'], '/web' => ['web.php','layout'], '/vacancy' => ['vacansii.php','layout'], '/polygraphy' => ['pechat.php', 'layout'], 
            '/orders' => ['admin/admin.php', 'admin'], '/order_types' => ['admin/create_order_type.php', 'admin'],'/auth'=>['admin/auth.php','auth']];
  $content = $routes[$_SERVER['REQUEST_URI']][0];
  $layout = $routes[$_SERVER['REQUEST_URI']][1];
// debug([$content, $layout], false);
  // debug([$content, $layout], true);
  if (file_exists('layouts/'.$layout.'.php')) {
    require('layouts/'.$layout.'.php');
  } else {
    // require('layouts/404.php');
    die('404 Page Not Found');
  }

?>