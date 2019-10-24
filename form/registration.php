<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    <h2 style="margin-left: 110px;"><a style="color: green;" href="admin_login.php">Admin</a> </h2>  

<div class="container">

<form style="margin-top: 40px;" method="post" action="registration.php">
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="name" class="form-control" name="name" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="Email1">Email</label>
    <input type="email" class="form-control" name="email" placeholder="Email">
  </div> 
  <div class="form-group">
    <label for="Email1">Password</label>
    <input type="password" class="form-control" name="pass" placeholder="Email">
  </div> 
   <button type="submit" class="btn btn-info" name="register">Submit</button>
   <b style="margin-left: 10px;">Already have an account?<a href="login.php">  Sign in</a></b>
</form>
</div>
</body>
</html>
  
  
<?php  
  
include("db.php");//make connection here  
if(isset($_POST['register']))  
{  
    $user_name=$_POST['name'];//here getting result from the post array after submitting the form.  
    $user_pass=$_POST['pass'];//same  
    $user_email=$_POST['email'];//same  
  
  
    if($user_name=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the name')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
    if($user_pass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
exit();  
    }  
  
    if($user_email=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
    exit();  
    }  
//here query check weather if user already registered so can't register again.  
    $check_email = "SELECT * FROM register WHERE email='$user_email'";

    $sql=mysqli_query($conn,$check_email);  
  
    if(mysqli_num_rows($sql)>0)  
    {  
        echo "<script>alert('Email already exist')</script>";  
        exit();  
    }  
//insert the user into the database.  
    $insert="INSERT INTO register (uname,password,email) VALUES ('$user_name','$user_pass','$user_email')";  
    if(mysqli_query($conn,$insert))  
    {  
echo"<script>window.open('login.php','_self')</script>";    
     }  
}   
?>  
