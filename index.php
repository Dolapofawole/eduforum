<?php
require_once "db.php";

$sql = "SELECT * FROM dashboard  Order By id DESC";
$select = mysqli_query($db, $sql);
if(mysqli_num_rows($select) < 1){

  $ict_content ="No data available";
  }



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduforum</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="...css/all.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark nav-one pl-5 pr-5">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#"><span class="brand_one">EDU</span><span class="brand_two">Forum</span></a>
  
  <!-- Links -->
  <ul class="navbar-nav  mr-auto">
  
</ul>
<ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link btn-nav border border-light mr-1" href="log_in.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-nav border border-light ml-1 " href="sign_in.php">Register</a>
            </li>
        </ul>
</nav>

<nav class="navbar navbar-expand-sm bg-light navbar-light  pl-5 pr-5">

  <ul class="navbar-nav">
  <div class="dropdown ">
  <button type="button" class="btn btn-dropdown dropdown-toggle" data-toggle="dropdown">
    Categories
  </button>
  <div class="dropdown-menu p-3">
    <a class="dropdown-item" href="cat_one.php">Career Ride</a>
    <a class="dropdown-item" href="cat_two.php">Technology in Education</a>
    <a class="dropdown-item" href="cat_three.php">Scholorship</a>
    <a class="dropdown-item" href="cat_four.php">Examination Tips</a>
    
  
  </div>
</div> 
    
    <li class="nav-item active">
      <a class="nav-link as active" href="index.php">Latest Update</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Terms</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
  </ul>
  
</nav>
<?php

    while($result = mysqli_fetch_array($select)){

    
  ?>
<div class="container pt-2">
<div class="row">

<div class="col-md-12 content p-3">


<div class="user">
      <img src="image/<?php echo $result['image']?>" height="50px"; width="50px">
      <span class="username"><?php echo $result['username'];?></span>
    </div>
  
<h4 class="head"><?php echo $result['topic'];?></h4>
<div class="content"> <?php echo $result['content'];?></div>
<div class="clearfix ">
  <span class="float-right cat_tag"><?php echo $result['category'];?></span>
</div>

</div>
<?php } ?>


</div>
</div>


<script src="jquery.js"></script>
<script src="popper.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>