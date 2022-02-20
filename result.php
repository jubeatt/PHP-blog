<?php
  require_once('conn.php');
  $data = $_POST['content'];

  $sql = "INSERT INTO posts_02(content) VALUES (?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $data);
  $stmt->execute();
  header('location: test.php');
?>


