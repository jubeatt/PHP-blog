<?php
  require_once('./conn.php');
  session_start();
  $username = null;
  if (!empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PeaNu's Blog</title>
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
    <h2 class="banner__title">PeaNu's blog</h2>
  </section>


  <main class="main">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
      <?php
        $template = '
        <a class="col" href="post.php?id=%s">
          <div class="card">
            <div class="card-img-wrap">
              <img src="img/post_preview.jpg" class="card-img-top">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">%s</h5>
              <p class="card-text">%s</p>
            </div>
          </div>
        </a>
        ';
        $sql = "SELECT * FROM posts";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
          echo sprintf(
            $template,
            htmlspecialchars($row['id']),
            htmlspecialchars($row['title']),
            htmlspecialchars($row['content'])
          );
        }
      ?>
      </div>
      <nav aria-label="Page navigation example">
        <div class="d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </div>
      </nav>
    </div>

  </main>
  
  <footer class="footer bg-dark text-center p-3 text-light">
    Copyright © 2022 Peanu's Blog All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>