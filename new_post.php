<?php
  require_once('conn.php');
  session_start();

  // 防止訪客進入
  if (empty($_SESSION['username'])) {
    header('Location: index.php');
    die();
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

  <?php require_once('nav.php');?>

  <section class="banner banner--admin">
    <h2 class="banner__title">新增文章</h2>
  </section>


  <main class="main">
    <div class="container">
      <form action="" method="POST">
        <div class="row col-lg-8 mx-lg-auto">
          <div class="input-group mb-3">
            <button type="button" class="btn btn-outline-secondary">分類一</button>
            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">分類一</a></li>
              <li><a class="dropdown-item" href="#">分類二</a></li>
              <li><a class="dropdown-item" href="#">分類三</a></li>
            </ul>
            <input type="text" name="title" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="請輸入文章標題">
          </div>
        </div>
        <div class="row col-lg-8 mx-lg-auto">
          <div class="input-group mb-3">
            <span class="input-group-text">文章內容</span>
            <textarea name="content" class="form-control" aria-label="With textarea"></textarea>
          </div>
        </div>
        <div class="row col-lg-8 mx-lg-auto">
          <div class="text-end">
            <button type="submit" class="btn btn-warning">送出</button>
          </div>
        </div>
      </form>
    </div>
  </main>
  
  <footer class="footer bg-dark text-center p-3 text-light">
    Copyright © 2022 Peanu's Blog All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>