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

  <?php require_once('nav.php'); ?> 

  <section class="banner banner--admin">
    <h2 class="banner__title">分類管理</h2>
  </section>


  <main class="main">
    <div class="container">

      <div class="d-flex flex-wrap justify-content-center align-items-center mb-5">
        <a class="button-category" href="admin_add_category.php">新增分類</a>
      </div>

      <div class="card mb-5">
        <div class="card-header py-4 fs-4">
          分類列表
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              分類名稱
            </div>
            <div>
              <button type="button" class="btn btn-warning">編輯</button>
              <button type="button" class="btn btn btn-danger">刪除</button>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              分類名稱
            </div>
            <div>
              <button type="button" class="btn btn-warning">編輯</button>
              <button type="button" class="btn btn btn-danger">刪除</button>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              分類名稱
            </div>
            <div>
              <button type="button" class="btn btn-warning">編輯</button>
              <button type="button" class="btn btn btn-danger">刪除</button>
            </div>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              分類名稱
            </div>
            <div>
              <button type="button" class="btn btn-warning">編輯</button>
              <button type="button" class="btn btn btn-danger">刪除</button>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </main>
  
  <footer class="footer bg-dark text-center p-3 text-light">
    Copyright © 2022 Peanu's Blog All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>