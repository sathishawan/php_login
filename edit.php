<?php
// including the database connection file
include "db.php";
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
     $user_name=$_POST['uname'];//here getting result from the post array after submitting the form. 

    $user_email=$_POST['email'];//same  
    
    // checking empty fields
    if(empty($user_name) || empty($user_email)) {            
        if(empty($user_name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($user_email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE register SET uname='$user_name',email='$user_email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: retrieve.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM register WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $user_name = $res['uname'];
    $user_email = $res['email'];
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

 
<body>
    <br/><br/>
    <form style="margin-top: 40px;" method="post" action="edit.php">
        <div class="container">
              <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="uname" value="<?php echo $user_name;?>">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user_email;?>">
             </div>
                 <input type="hidden"  name="id" value="<?php echo $_GET['id'];?>"> 

                 <button type="submit" class="btn btn-info" name="update">Update</button>

        </div>  
    </form>
</body>
</html>
