<?php
setcookie('token', NULL, 0, '/');
$error = '';
if (isset($_POST['username']) && isset($_POST['password'])) {
  $hash = $dbInterface->db->query("SELECT password FROM admins WHERE username='" . $_POST['username'] . "'")->fetch();
  if (isset($hash['password']) && password_verify($_POST['password'], $hash['password'])) {
    $token = md5(uniqid(rand(), true));
    $dbInterface->db->query("UPDATE admins SET token ='$token'");
    setcookie('token', $token, 0, '/');
    header('Location: /orders');
    die();
  }
  $error = 'Auth error!';
}
?>
<?= $error;?>
<form action="/auth" method="POST">
    Username: <input type="text" name="username">
    Passsword: <input type="password" name="password"> 
    <button type="submit">Login</button>
  </form>