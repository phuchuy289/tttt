<!-- index -->
 
<?php
require_once('connection.php');
require_once('utils/redirect.php');
require_once('utils/account.php');
require_once('models/User.php');

session_start();

// Tự động đăng nhập bằng cookie nếu chưa có session
if (!isUserLoggedIn() && isset($_COOKIE['remember_token'])) {
  $user = User::getUserByToken($_COOKIE['remember_token']);
  if ($user) {
      $_SESSION['user_id'] = $user->id;
      setUserLogin(serialize($user));
  }
}

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'home';
  $action = 'index';
}
require_once('routes.php');
