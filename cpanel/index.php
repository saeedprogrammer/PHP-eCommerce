<?php 
$title = "Home";
 session_start();
 if (isset( $_SESSION["userName"]))
 {
    header("Location: dashBoard.php");
    exit();
 }

 include_once("init.php"); 



if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_POST['userName'];
    $password = $_POST['password'];
  

  
   $stmt =  $pdo->prepare("SELECT UserID , UserName,Password FROM Users WHERE UserName=:userName AND Password=:password  ");
   $stmt->execute([
       "userName"=>$username  ,
       "password"=>$password
    ]);
  
   if($stmt->rowCount())
   {
    $row = $stmt->fetch();
    $_SESSION["userName"] = $username;
    $_SESSION["userID"] =  $row["UserID"];

    header("Location: dashBoard.php");
   }
   
 
}
 

 include_once ($tmp_path."header.php"); 


 
 
 ?>




<form class="login" action="<? echo $_SERVER['PHP_SELF']?>" method="POST" >
    <h4 class="text-center">Cpanel</h4>
    <input class="form-control login-form-control" type="text" name="userName" placeholder="Username" />
    <input class="form-control login-form-control" type="password" name="password" placeholder="Password" />
    <input class="btn btn-primary btn-block login-form-control" type="submit"  value="Login" />
</form>
<?php include_once ($tmp_path."footer.php"); ?>
