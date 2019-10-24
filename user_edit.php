<?php  
session_start();  
  
if(!$_SESSION['username'])  
{  
  
    header("Location: admin_login.php"); //redirect to admin_login page to secure the welcome page without login access.  
}  
  
?>
<html>

<head>

<style>

table

{

border: 1px solid #2C344E;

width: 70%

}

</style>

</head>
<center>

<body style="margin-top: 60px;" bgcolor="#D7E0E2">
<h3 style="margin-left: 1200px;"><a style="color: red;" href="admin_logout.php">Logout</a> </h3>  
	<br/><br/>

<?php

include("db.php");//make connection here  

$sql = mysqli_query($conn, "SELECT * FROM register");

 echo "<table border='1'>

<tr>

<th>Id</th>

<th>User Name</th>

<th>Email</th>

 <td>Update</td>

</tr>";

 

while($row = mysqli_fetch_array($sql))

  {

  echo "<tr>";

  echo "<td>" . $row['id'] . "</td>";

  echo "<td>" . $row['uname'] . "</td>";

  echo "<td>" . $row['email'] . "</td>";

            echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";  



  echo "</tr>";

  }

echo "</table>";

?>

</body>
</center>

</html>
