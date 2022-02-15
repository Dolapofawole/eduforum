<?php
require_once "db.php";

$errors=[];
$success=[];
if(isset($_POST['submit'])){
  $temp = $_FILES['img']['tmp_name'];
  $size = $_FILES['img']['size'];
  $img_name = basename($_FILES['img']['name']);
  $path =pathinfo($img_name, PATHINFO_EXTENSION);
  $folder = "image/".$img_name;
  

    if(empty(($_POST['name']))){
        $errors['name_error']="your name is requred";
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
  
        $errors["name_error"] = "check your name, Only letters and white space allowed";
        
        }
    else{
        $name=$_POST['name'];
    }

    if(empty(($_POST['username']))){
        $errors['username_error']="your username is required";
    }

    else{
        $username = $_POST["username"];
    } 
    if(empty(($_POST['email']))){
        $errors['email_error'] = "your email is required";
    }
    elseif((!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL ))) {
  
        $errors["email_error"] ="Invalid email format";
      }

    else{
        $mail = $_POST['email'];

        $sql = "SELECT email FROM users WHERE email='$mail'";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result) > 0){
          $errors['email_error']="email already exist";

        } 
      else{
          $email= $_POST['email'];
        }

    }
    if(empty(($_POST['password']))){
        $errors['password_error'] = "your password is required";
    }

    else{
        $password = $_POST['password'];
    }

    if(empty(($_POST['phone']))){
        $errors['phone_error'] = "your phone number is required";
    }

    else{
        $ph = $_POST['phone'];
        $sql = "SELECT phone from users WHERE phone='$ph'";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result) > 0 )
        {
          $errors['phone_error']="Phone number already exist";
        }
        else{
          $phone = $_POST['phone'];
        }

        
    }
    
    if(! $errors){
      $sql = "INSERT INTO users(name, username, email, password, phone, image) values('$name', '$username', '$email', '$password', '$phone', '$img_name')";
      if(mysqli_query($db, $sql)){
        $success['success_msg'] = "Submitted successfully";
      }
      move_uploaded_file($temp, $folder);
     }

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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


  <div class="col-md-6 offset-md-3">
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

    

   


</div>

</div>
<div class="container pt-5 main">    
<div class="row">
<div class="col-md-8">
<div class="contact-two-co">
<h3>
   Register
</h3>
<p>Enter your Details Below</P>
  <form method="post" action="sign_in.php" enctype="multipart/form-data">

    <div class="form-group">
      <label for="name">Full Name:</label>
      <input type="text" class="form-control" placeholder="Enter name"  name="name" value="<?php if(isset($_POST['submit'])){ $name= $_POST["name"]; echo $name;}?>">
      <span class="text-danger">
          <?php
            if(array_key_exists('name_error', $errors)){
                echo $errors['name_error'];
            }
          ?>
      </span>
    </div>

    <div class="form-group">
      <label for="name">Username:</label>
      <input type="text" class="form-control" placeholder="Enter Username " name="username"  value="<?php if(isset($_POST['submit'])){ $username= $_POST["username"]; echo $username;}?>">      <span class="text-danger">
          <?php
            if(array_key_exists('username_error', $errors)){
                echo $errors['username_error'];
            }
          ?>
      </span>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="" class="form-control" placeholder="Enter email" name="email" value="<?php if(isset($_POST['submit'])){ $email= $_POST["email"]; echo $email;}?>">
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
      <input type="password" class="form-control" placeholder="Enter password" name="password">
      <span class="text-danger">
          <?php
            if(array_key_exists('password_error', $errors)){
                echo $errors['password_error'];
            }
          ?>
      </span>
    </div>
    <div class="form-group">
      <label for="number">Phone Number:</label>
      <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="<?php if(isset($_POST['submit'])){ $phone= $_POST["phone"]; echo $phone;}?>">
      <span class="text-danger">
          <?php
            if(array_key_exists('phone_error', $errors)){
                echo $errors['phone_error'];
            }
          ?>
      </span>
    </div>
    <div class="form-group">
    <label>Picture:</label>
    <input type="file" name="img" class="form-control">
  </div>
    
    <button type="submit" name="submit" class="submit-btn form-control">Submit</button>
    <span >Already have an account<a href="log_in.php" class="m-1">log in</a></span>
  </form>
</div>

</div>

<div class="col-md-4 contact-one-col pt-5">
<span class="">
Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quam architecto, 
ab corrupti ipsa nemo autem unde quas molestiae, magni, doloremque possimus
</span>
<div class="pt-4">
<a href="index.php"  class="btn btn-light">Back Home</a>
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