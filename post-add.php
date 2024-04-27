<?php
include 'db/conn.php';
if(isset($_POST['submit'])){
  $title = $_POST['title'];
  $abstract = $_POST['abstract'];
  $order = $_POST['order'];
  $body = $_POST['body'];
  $file_name = $_FILES['image']['name'];
  $tempname = $_FILES['image']['tmp_name'];
  $folder = 'uploads/'.$file_name;

  $sql="insert into `title` (title,abstract,ordered,body,filename)
  values('$title','$abstract','$order','$body','$file_name')";
  $result = mysqli_query($con,$sql);
  move_uploaded_file($tempname,$folder);

  if($result){
    header('location:post-list.php');
    // ?>
    //   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    //   <div class="alert alert-success">
    //   Blog created successfully!
    //   </div>


    //   <script type="text/javascript">

    //   $(document).ready(function () {
      
    //   window.setTimeout(function() {
    //       $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
    //           $(this).remove(); 
    //       });
    //   }, 5000);
      
    //   });
    //   </script>
    <?php
  }else{
    die(mysqli_error($con));
  }
}  
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>post-add</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cheatsheet/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
  </head>
  <body class="bg-body-tertiary">
      <?php
      require_once 'db/conn.php'
      ?>
        <div class="bd-example-snippet bd-code-snippet container my-5">
        <a href="post-list.php" class="btn btn-outline-primary btn-lg active col-md-3 mb-3" role="button" aria-pressed="true">Blog List</a>
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
  <div class="bd-example m-0 border-0">
  <h3>Blog</h3>
  <br>
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="mb-3">
            <label class="form-label">Abstract</label>
            <input type="text" class="form-control" name="abstract">
          </div>
          <div class="col-md-3 mb-3">
            <label class="form-label">Order</label>
            <input type="number" class="form-control" name="order">
          </div>
          <div class="mb-3">
          <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea class="form-control" name="body"></textarea>
          </div>
          <div class="custom-file">
            <input type="file" accept="image/jpeg" class="custom-file-input" id="image" name="image">
          </div>
          <br>
          <br>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        
  </div>
</div>
