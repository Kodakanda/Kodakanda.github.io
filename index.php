<?php 
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
	require('functions.php');
	require('db.php');
	$dbInterface = new DBInterface();

	$authorized = false;
	if(isset($_COOKIE['token'])){
		$sth = $dbInterface->db->prepare("SELECT token FROM admins WHERE token=:token");
		$sth->execute(['token' => $_COOKIE['token']]);
		$token = $sth->fetch();
		if(isset($token['token'])) {
			$authorized = true;
		}
	}

	$routes = [
		'/' => ['main.php', 'layout'],
		'/web' => ['web.php','layout'],
		'/vacancy' => ['vacansii.php','layout'],
		'/polygraphy' => ['pechat.php', 'layout'],
		'/orders' => ['admin/admin.php', 'admin'],
		'/order_types' => ['admin/order_type_list.php', 'admin'],
		'/order_type_edit' => ['admin/order_type_form.php', 'admin'],
		'/auth'=>['admin/auth.php','auth']
	];

	// получаем урл без GET параметров
	$uri = parse_url(preg_replace('/&/', '?', $_SERVER["REQUEST_URI"], 1))['path'];

	$content = $routes[$uri][0];
	$layout = $routes[$uri][1];

	if (file_exists('layouts/'.$layout.'.php')) {
		require('layouts/'.$layout.'.php');
	} else {
		die('404 Page Not Found');
	}

?>