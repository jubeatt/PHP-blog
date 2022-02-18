<?php
  require_once('conn.php');
  session_start();

  // 防止訪客新增文章
  if (empty($_SESSION['username'])) {
    header('Location: index.php');
    die();
  }

  // 檢查內容
  if (empty(empty($_POST['title']) || empty($_POST['content']) || $_POST['category'])) {
    header('Location: admin_add_post.php?errorCode=1');
    die();
  }

  $post_title = $_POST['title'];
  $post_content =$_POST['content'];
  $post_category_id = $_POST['category'];

  $sql = "INSERT INTO posts(title, content, category_id) VALUES(?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sss', $post_title, $post_content ,$post_category_id);
  $stmt->execute();
  
  header('Location: admin_posts.php');
?>