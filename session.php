<?php
  // 防止 CSRF 的設定
  // session_set_cookie_params([
  //   'lifetime' => 3600,
  //   'path' => '/peanu/blog/',
  //   'domain' => 'localhost',
  //   'secure' => TRUE,
  //   'httponly' => TRUE,
  //   'samesite' => 'Lax'
  // ]);
  session_start();
?>