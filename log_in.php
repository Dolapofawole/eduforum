<?php
session_start();

require_once "db.php";

$errors=[];
if(isset($_POST['submit'])){
    if(empty(($_POST['email']))){
        $errors['email_error'] = "your email is required";
    }

    else{
        $email = $_POST['email'];
    }
    if(empty(($_POST['password']))){
        $errors['password_error'] = "your password is required";
    }

    else{
        $password = $_POST['password'];
    }
   if(! $errors){
     $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
     $select = mysqli_query($db, $sql);
     if(mysqli_num_rows($select) < 1 ){
        $errors['email_error'] = "invalid details";
     }
     else{
        $result = mysqli_fetch_array($select);
        $username = $result['username'] ;
        $useremail = $result['email'];
        $fname= $result['name'];
        $img_name = $result['image'];
        
     }
     if(! $errors){
       $_SESSION['username']=$username;
       $_SESSION['name']=$fname;
       $_SESSION['phone']=$phone_num;
       $_SESSION['image']=$img_name;


      header('location:main_dashboard.php');
     }
   }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="animate.css">
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="css/all.min.css">
<link rel="stylesheet" href="css/sign_in.css">
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
require_once "nav_one.php"
?>

<div class="container pt-5 main">   
<div class="row">

<div class="col-3">

</div>
<div class="col-md-6">

<h3>
   Log In
</h3>

  <form method="post" action="log_in.php">

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php if(isset($_POST['submit'])){ $name= $_POST["email"]; echo $email;}?>">
      <span class="text-danger">
          <?php
            if(array_key_exists('email_error', $errors)){
                echo $errors['email_error'];
            }
          ?>
      </span>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="" class="form-control" placeholder="Enter password" name="password">
      <span class="text-danger">
          <?php
            if(array_key_exists('password_error', $errors)){
                echo $errors['password_error'];
            }
          ?>
      </span>
    </div>

    
    <button type="submit" class="submit-btn form-control" name="submit">Submit</button>
    <span >You don't have an account<a href="sign_in.php" class="m-1">Sign in</a></span>
  </form>
</div>

</div>
</div>
</div>
 





    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="wow.min.js"></script>
    <script>new WOW().init();</script>
    
</body>
</html>