<?php
include 'db/conn.php';

$url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$validURL = str_replace('&','&amp', $url);

if(strpos($validURL, 'category') !== false){
  $category_selected=$_GET['category'];
}

// $category_selected=$_GET['category'];

if(isset($_POST['submit'])){
  $category_selected = $_POST['category_selected'];
  header('location:post-list.php?category='.$category_selected.'');
}else{
  $category_selected = null;
}
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
  <div class="dropdown col-md-3 mb-3">
  <form method="post" enctype="multipart/form-data">
      <?php
        $sql = "Select * from `category`";
        $result = mysqli_query($con, $sql);
        if ($result){
          while ($row = mysqli_fetch_assoc($result)) {
            $category_name = $row['category_name'];
            echo '<button type="submit" class="btn btn-secondary" name="category_selected" value='.$category_name.'>'.$category_name.'</button>';
          }
        }
      ?>
  </form>
  </div>
  <div class="list-group">
    <?php
    $sql = "Select `title`.*,`category`.`category_name` from `title` left join `category` on `title`.`category_id`=`category`.`id`";
    $result = mysqli_query($con, $sql);
    if ($result){
        while ($row = mysqli_fetch_assoc($result)) {
          $title = $row['title'];
          $abstract = $row['abstract'];
          $order = $row['ordered'];
          $category_id = $row['category_id'];
          $id = $row['id'];
          $image = $row['filename'];
          $deleted_at = $row['deletedat'];
          $category_name = $row['category_name'];

          if ($deleted_at == null) {
            if ($category_selected == null) {
            echo '<div " class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="">
            <h5 class="mb-1 d-flex w-100 justify-content-between">'.$order.'. '.$title.'<small class="float-end">'.$category_name.'</small></h5>
            <br>
            <p class="mb-1">'.$abstract.'</p>
            <img src="uploads/'.$image.'" class="rounded mx-auto d-block" style="height: 18rem;"/>
            </div>
            <div class="float-end">
            <a href="/phpprj/post-view.php?id='.$id.'"><button class="btn btn-dark rounded-pill px-3" type="button">view</button></a>
            <a href="/phpprj/post-edit.php?id='.$id.'"><button class="btn btn-dark rounded-pill px-3 text-success" type="button">edit</button></a>
            <a onclick="deleteconf('.$id.');"><button class="btn btn-dark rounded-pill px-3 text-danger" type="button">delete</button></a>
            </div>
            </div>';
            }elseif ($category_selected == $category_name) {
              echo '<div " class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="">
            <h5 class="mb-1 d-flex w-100 justify-content-between">'.$order.'. '.$title.'<small class="float-end">'.$category_name.'</small></h5>
            <br>
            <p class="mb-1">'.$abstract.'</p>
            <img src="uploads/'.$image.'" class="rounded mx-auto d-block" style="height: 18rem;"/>
            </div>
            <div class="float-end">
            <a href="/phpprj/post-view.php?id='.$id.'"><button class="btn btn-dark rounded-pill px-3" type="button">view</button></a>
            <a href="/phpprj/post-edit.php?id='.$id.'"><button class="btn btn-dark rounded-pill px-3 text-success" type="button">edit</button></a>
            <a onclick="deleteconf('.$id.');"><button class="btn btn-dark rounded-pill px-3 text-danger" type="button">delete</button></a>
            </div>
            </div>';
            }
          };
        };
    };
    ?>
  </div>
  </div>
   <script>
  function deleteconf($id) {
    if (confirm("Delete this item?")) {
      window.location.href = "/phpprj/post-delete.php?id=<?php echo $id; ?>"
    }}
  </script>
  </body>
</html>