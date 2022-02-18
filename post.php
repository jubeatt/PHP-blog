<?php
  require_once('conn.php');
  session_start();
  
  // 沒帶 id，導回首頁
  if (empty($_GET['id'])) {
    header('Location: index.php');
    die();
  }

  $username = null;

  if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
  }

  $post_id = $_GET['id'];
  $sql = "SELECT * FROM posts WHERE id=? AND is_deleted = 0";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $post_id);
  $stmt->execute();
  $result = $stmt->get_result();

  // 找不到對應文章，導回首頁
  if ($result->num_rows === 0) {
    header('Location: index.php');
    die();
  }

  $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PeaNu's Blog</title>
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">PeaNu</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
          <li class="nav-item">
            <a class="nav-link" href="category.php">文章分類</a>
          </li>
          <li class="nav-item me-lg-auto">
            <a class="nav-link" href="about.php">關於我</a>
          </li>
          <?php if (empty($username)) { ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">登入</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">後台管理</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="handle.logout.php">登出</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <section class="banner">
    <h2 class="banner__title"><?php echo htmlspecialchars($row['title']);?></h2>
  </section>


  <main class="main">
    <div class="container">
      <div class="post-header-item">
        <i class="fas fa-tag"></i>
        分類：<?php echo htmlspecialchars($row['category_id']);?>
      </div>
      <div class="post-header-item">
        <i class="far fa-calendar-alt"></i>
        日期：<?php echo htmlspecialchars($row['created_at']);?>
      </div>
      <div class="line-break"></div>
      <div class="post-content"><?php echo htmlspecialchars($row['content']);?></div>
    </div>

  </main>

  <footer class="footer bg-dark text-center p-3 text-light">
    Copyright © 2022 Peanu's Blog All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>