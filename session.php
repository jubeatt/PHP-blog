<?php
  session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/peanu/blog/',
    'domain' => 'localhost',
    'secure' => TRUE,
    'httponly' => TRUE,
    'samesite' => 'Lax'
  ]);
  session_start();
?>