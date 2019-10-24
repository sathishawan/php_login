<?php  
session_start();  
  
if(!$_SESSION['email'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
}  
  
?>  
  
<html>  
<head>  
  
    <title>  
        Registration  
    </title>  
</head>
<h3 style="margin-left: 1200px;"><a style="color: red;" href="logout.php">Logout</a> </h3>  

<body> 
<center> 
<h1>Welcome</h1><br>  
<?php  
echo $_SESSION['email'];  
?>  
  
  
  
  </center>
</body>  
  
</html> 