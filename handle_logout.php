<?php
  session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/peanu/blog/',
    'domain' => 'localhost',
    'secure' => TRUE,
    'httponly' => TRUE,
    'samesite' => 'Lax'
  ]);
  $cookie_Info = session_get_cookie_params();
  session_start();
  setcookie(session_name(), '', time()-42000, $cookie_Info['path']);
  session_destroy();
  header('location: index.php');
?>