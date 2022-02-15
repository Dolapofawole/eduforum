<?php

session_start();
if($_SESSION['username']){
   $user = $_SESSION['username'];
   $fullname = $_SESSION['name'];
   $profile_img = $_SESSION['image'];
}

require_once "db.php";

$errors=[];
$success=[];
if(isset($_POST['submit'])){
    if(empty(($_POST['text']))){
        $errors['error_text'] = "Text area cannot be empty";
    }
    else{
        $text = $_POST['text'];
    }

    if(empty(($_POST['category']))){
        $errors['error_category'] = "Category is required";
    }
    else{
        $category = $_POST['category'];
    }
    if(empty(($_POST['topic']))){
        $errors['error_topic'] = "Topic is required";
    }
    else{
        $topic = $_POST['topic'];
    }
  $slug = str_replace(" ", "-", $topic.time());
  
    if(! $errors){
        $sql = "INSERT INTO dashboard(category, topic, content, username, slug, image) values('$category', '$topic', '$text', '$user', '$slug', '$profile_img')";
        if(mysqli_query($db, $sql)){
            $success['success_msg']="submitted successfully";
           
        }
      
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduform/dashboard</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- custom css -->
    <link href="chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
     <!-- Custom CSS -->
     <link href="dist/css/style.min.css" rel="stylesheet">
  
    

</head>
<body>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                <a class="navbar-brand" href="index.php"><span class="brand_one logo-text">EDU</span>
                <span class="brand_two logo-text">Forum</span></a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="mdi mdi-menu"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->

                 <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown" name="user">
                        
                          <?php
                                echo "Welcome"." ".$user;
                          ?>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
    
            </nav>
        </header>

        <!-- ============================================================ -->
        <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar " data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="main_dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="#" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">LINK !</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="post_upload.php" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">All post</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="#" aria-expanded="false"><i class="mdi mdi-face"></i><span
                                    class="hide-menu">LINK 3</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="starter-kit.html" aria-expanded="false"><i class="mdi mdi-file"></i><span
                                    class="hide-menu">LINK 4</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="#" aria-expanded="false"><i class="mdi mdi-alert-outline"></i><span
                                    class="hide-menu">LINK5</span></a></li>
                        <li class="text-center p-40 upgrade-btn">
                            <a href="#"
                                class="btn d-block w-100 btn-danger text-white" target="_blank">Button LINK</a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

       
      
        <div class="container-fluid">

        <div class="col-md-12 ">
    <?php
    if(isset($_POST['submit']) && !$errors){
      ?>

<div class="alert alert-success text-center">
  <?php
  if(array_key_exists('success_msg', $success)){
      echo $success['success_msg'];
  }

  ?>

    </div>

   <?php } ?>

<div class="row">
<div class="col-md-6 bg-light border">
<form method="post" action="main_dashboard.php">

  <div class="form-group">
    <label><h2>Categories:</h2></label>
    

    <select class="form-control dropdown-toggle" type="text"  data-toggle="dropdown" name="category">
    <option href="#">Career Ride</option>
    <option href="#">Scholarship</option>
    <option href="#">Examination Tips</option>
    <option href="#">Technology</option>


   
</select>

  <label for="usr">Topic:</label>
  <input type="text" name="topic" placeholder="Enter topic here" class="form-control" id="usr">
  <label for="usr">Content:</label>
<textarea class="form-control" placeholder="Enter your content here" rows="10" id="comment" name="text" value="<?php if(isset($_POST['text'])){ $text= $_POST["text"]; echo $text;}?>"></textarea>
<span class="text-danger">
          <?php
            if(array_key_exists('error_text', $errors)){
                echo $errors['error_text'];
            }
          ?>
      </span>
  </div>
  <button type="submit" class="btn form-control submit-button" name="submit">Submit</button>

</form>

</div>
<div class="col-md-6">
<div class="card bg-light border border-dark p-5" style="width:400px">
<h4 class="card-title"> Profile </h4>
  <img class="card-img-bottom" name="img" src= "image/<?php echo $profile_img ?>" alt="userpic" style="width:100px; height:100px;">
  <div class="pt-2">
    <h5 class=""><?php echo $fullname?></h5>
    
    
  </div>
</div>

</div>
       
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
</div>

<script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="wow.min.js"></script>

     <!--Wave Effects -->
     <script src="dist/js/waves.js"></script>

    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->

</script>
</body>
</html>