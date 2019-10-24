<?php  
session_start();//session starts here  
  
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
<form style="margin-top: 40px;" method="post" action="admin_login.php">

<div class="container">
  <div class="form-group">
    <label for="email">User name</label>
    <input type="text" class="form-control" name="username" placeholder="Enter username" required autofocus>
  </div> 
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
  </div>
    <button type="submit" class="btn btn-info" name="login">Login</button>

</div>
</form>

</body>
</html>  
  
<?php  
  
include("db.php");  
  
if(isset($_POST['login']))  
{  
    $username=$_POST['username'];  
    $password=$_POST['password'];  
  
    $admin="select * from admin WHERE username='$username' AND password='$password'";  
  
    $sql=mysqli_query($conn,$admin);  
  
    if(mysqli_num_rows($sql))  
    {  
        echo "<script>window.open('retrieve.php','_self')</script>";  
  
        $_SESSION['username']=$username;
    }  
    else  
    {  
      echo "<script>alert('User name or password is incorrect!')</script>";  
    }  
}  
?>
