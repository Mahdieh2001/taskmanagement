<?php
include 'db/conn.php';
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>post-list</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cheatsheet/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
  <body class="bg-body-tertiary">
  <div class="bd-example m-0 border-0 my-5 row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3">
  <a href="post-add.php" class="btn btn-outline-primary btn-lg active col-md-3 mb-3" role="button" aria-pressed="true">Add Blog</a>
  <div class="list-group">
    <?php
    $sql = "Select * from `title`";
    $result = mysqli_query($con, $sql);
    if ($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $abstract = $row['abstract'];
            $order = $row['ordered'];
            $id = $row['id'];
            echo '<a href="/phpprj/post-view.php?id='.$id.'" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">'.$order.'. '.$title.'</h5>
            </div>
            <br>
            <p class="mb-1">'.$abstract.'</p>
          </a>';
    }
}
    ?>
</div>
  </div>
  </body>
</html>