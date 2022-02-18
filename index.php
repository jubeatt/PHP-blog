<?php
  require_once('conn.php');
  session_start();
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
        $sql = "SELECT * FROM posts WHERE is_deleted = 0";
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