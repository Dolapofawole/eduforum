<?php
session_start();
require_once "db.php";
if( isset($_GET['details'])){
    $id = $_GET['details'];
   $sqli = "DELETE  FROM dashboard where slug='$id'";
  if($select = mysqli_query($db, $sqli)){
      $success = "The post details was deleted successfully";
     
  }
 }

$sql = "SELECT * FROM dashboard";
$select = mysqli_query($db, $sql);
if(mysqli_num_rows($select) < 1){
    $data = "data not available";
}



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>
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
                                    class="mdi mdi-account-network"></i><span class="hide-menu">LINK !</span></a></li>
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
            <?php
            if(isset($_GET['details']))
            {
               ?>

                <div class='alert alert-success'>

                <?php echo $success ?>
                
              </div>

          <?php  } ?>
        <table class="table">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Category</th>
        <th>Topic</th>
        <th>Content</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
        <?php
            $i=1;
            while($result = mysqli_fetch_array($select)){
                $slug = $result['slug'];
               
        ?>
      <tr>
        <td><?php echo $i++?></td>
        <td><?php echo $result['category']; ?></td>
        <td><?php echo $result['topic']; ?></td>
        <td><?php echo $result['content']; ?></td>
        <td> <div class="d-flex"><a href="post_update.php?details=<?php echo $slug ?>" class="btn btn-success btn-md">Edit</a>
        <a href="post_upload.php?details=<?php echo $slug ?>" onclick="confirm('Are you sure you want to delete the post?')" class="btn btn-danger btn-md ml-1" >Delete</a> </div></td>
      
      </tr>
     <?php } ?>
    </tbody>
  </table>



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