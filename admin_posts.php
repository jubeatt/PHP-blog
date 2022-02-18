<?php
  require_once('conn.php');
  session_start();

  // 非管理員的人造訪
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
    <h2 class="banner__title">文章管理</h2>
  </section>


  <main class="main">
    <div class="container">

      <div class="d-flex flex-wrap justify-content-center align-items-center mb-5">
        <a class="button-add-post mb-3 mb-md-0" href="new_post.php">新增文章</a>
      </div>

      <div class="card mb-5">
        <div class="card-header py-4 fs-4">
          文章列表
        </div>
        <ul class="list-group list-group-flush">
          <?php
            $template = '
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div>
                %s
              </div>
              <div>
                <a href="update_post.php?id=%d" class="btn btn-warning">編輯</a>
                <a href="handle_delete_post.php?id=%d" class="btn btn btn-danger">刪除</a>
              </div>
            </li>';
            $sql = "SELECT * FROM posts WHERE is_deleted = 0";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
              echo sprintf(
                $template,
                htmlspecialchars($row['title']),
                htmlspecialchars($row['id']),
                htmlspecialchars($row['id']),
              );
            }
          ?>
        </ul>
      </div>
      <nav aria-label="Page navigation example">
        <div class="d-flex justify-content-center">
          <ul class="pagination">
            <li class="page-item page-item disabled"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
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