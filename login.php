<?php  
session_start();//session starts here  
  
?>  
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
<form style="margin-top: 40px;" method="post" action="login.php">

<div class="container">
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" required autofocus>
  </div> 
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="pass" placeholder="Enter password" required>
  </div>
    <button type="submit" class="btn btn-info" name="login">Login</button>
    <b style="margin-left: 10px;">New account?<a href="registration.php">  Sign up</a></b>

</div>
</form>

</body>
</html>  
  
<?php  
  
include("db.php");  
  
if(isset($_POST['login']))  
{  
    $user_email=$_POST['email'];  
    $user_pass=$_POST['pass'];  
  
    $check_user="select * from register WHERE email='$user_email' AND password='$user_pass'";  
  
    $sql=mysqli_query($conn,$check_user);  
  
    if(mysqli_num_rows($sql))  
    {  
        echo "<script>window.open('welcome.php','_self')</script>";  
  
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.  
  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  
}  
?>
