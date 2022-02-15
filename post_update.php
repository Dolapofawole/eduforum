<?php
session_start();

require "db.php";
if( isset($_GET['details'])){
   $slug = $_GET['details'];
  $sql = "SELECT * FROM dashboard where slug='$slug'";
  $select = mysqli_query($db, $sql);
//  if(mysqli_num_rows($select) < 0 ){
//      echo  "No data available";
//  }
//  else{
//      echo "Data is availabe";
//  }
  $result = mysqli_fetch_array($select);
   $category= $result['category'];
   $content= $result['content'];
   $topic= $result['topic'];
}

$errors=[];
if(isset($_POST['submit'])){
    if(empty(($_POST['text']))){
           $errors['text_error']="Enter the textarea";
        }
    else{
        $text_update=$_POST['text'];
    }

    if(empty(($_POST['category']))){
        $errors['category_error']="Enter the category";
    }
    else{
        $category_update=$_POST['category'];
    }
    if(empty(($_POST['topic']))){
        $errors['topic_error']="Enter the topic";
    }
    else{
        $topic_update=$_POST['topic'];
    }
    
    $myslug = $result['slug'];
    if(! $errors){
        $sql= "UPDATE dashboard SET category='$category_update', topic='$topic_update', content='$text_update' WHERE slug='$myslug'";
        if(mysqli_query($db, $sql)){
            echo "Post has been updated successfully";
        }
        header('location:post_upload.php');
    }

}

   
?> 


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post</title>
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
                               // echo "Welcome"." ".$user;
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
                                    class="mdi mdi-account-network"></i><span class="hide-menu">All Post</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="#" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">LINK 2</span></a></li>
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
<div class="row">
<div class="col-md-12 bg-light border">
<form method="post" action="">

  <div class="form-group">
    <label><h2>Categories:</h2></label>
    

    <select class="form-control dropdown-toggle" type="text"  data-toggle="dropdown" name="category">
    <option selected value="<?php echo$category?>"><?php echo $category?></option>
    <option >Career Ride</option>
    <option >Technology in Education</option>
    <option >Scholarship</option>
    <option >Examination Tips</option>
   
   
</select>

  <label for="usr">Topic:</label>
  <input type="text" name="topic" placeholder="Enter topic here" class="form-control" value="<?php echo $topic?>">
  <label for="usr">Content:</label>
<textarea class="form-control" rows="5" id="comment" name="text" selected value="<?php echo $content;?>"><?php echo $content?></textarea>
<span class="text-danger">
          <?php
            if(array_key_exists('error_text', $errors)){
                echo $errors['error_text'];
            }
          ?>
      </span>
  </div>
  <button type="submit" class="btn form-control submit-button" name="submit">Update</button>

</form>

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