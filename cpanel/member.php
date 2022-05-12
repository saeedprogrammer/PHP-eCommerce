<?php 
 include_once("init.php"); 
 
 session_start(); 


 if (isset($_GET["action"]) && $_GET["action"] == "edit" )
 {
   $title = "Edit member";
   $action = "?action=edit";
     
       if (isset($_GET["ID"]) && is_numeric($_GET["ID"]))
       {
         $ID = intval($_GET["ID"]);

         $action .= "&ID=".$ID;
         if (empty($_POST))
         {
            $stmt = $pdo->prepare("SELECT UserName,Password,Email,FullName FROM Users WHERE UserID=?");
            $stmt->execute([$ID]);
            $row = $stmt->fetch();
   
           $useName =  $row["UserName"];
           $password =  $row["Password"];
           $email =  $row["Email"];
           $fullName =  $row["FullName"];
         }
         else
         {
      
            $stmt = $pdo->prepare("UPDATE Users SET UserName = :username ,Password = :password,Email = :email ,FullName = :fullname  WHERE UserID= :ID");
            $stmt->execute([
               "ID" => $ID ,
               "username" => $_POST["username"] ,
               "password" => $_POST["password"] ,
               "email" => $_POST["email"] ,
               "fullname" => $_POST["fullname"] ,

            ]);
          
   
           $useName =  $_POST["username"];
           $password =  $_POST["password"];
           $email =  $_POST["email"];
           $fullName =  $_POST["fullname"];
           header("Location: members.php");
   
         }
    



       }
    
 }
 else if (isset($_GET["action"]) && $_GET["action"] == "add" )
 {

   $useName = "";
   $password =  "";
   $email =  "";
   $fullName = "";

   $title = "Add member";
   $action = "?action=add";
    
   if (!empty($_POST))
   {
      $photoDict = $_FILES["userprofile"];
      $photoName =  explode(".",$photoDict["name"])[0] ;
      $stmt = $pdo->prepare("INSERT INTO Users (UserName,Password,Email,FullName,RigisterDate,Photo)  VALUE(:username  , :password , :email , :fullname , now() , '$photoName' ) ");
      $stmt->execute([
         "username" => $_POST["username"] ,
         "password" => $_POST["password"] ,
         "email" => $_POST["email"] ,
         "fullname" => $_POST["fullname"] 
      ]);

           $useName =  $_POST["username"];
           $password =  $_POST["password"];
           $email =  $_POST["email"];
           $fullName =  $_POST["fullname"];

           $d = move_uploaded_file($photoDict["tmp_name"], "uploads/".$photoName);
           echo $d;
           header("Location: members.php");
   }


       
    
 } else if (isset($_GET["action"]) && $_GET["action"] == "delete" )
 {

   $useName = "";
   $password =  "";
   $email =  "";
   $fullName = "";

   $title = "Delete member";
   $action = "?action=delete";
    
   if (isset($_GET["ID"]) && is_numeric($_GET["ID"]))
       {
         $ID = intval($_GET["ID"]);

         $action .= "&ID=".$ID;
         $stmt = $pdo->prepare("DELETE FROM Users   WHERE UserID= :ID");
         $stmt->execute(["ID" => $ID ]);     
         header("Location: members.php");
       }

    
 }
 
 include_once ($tmp_path."header.php");
 include_once ($tmp_path."navBar.php");  
 ?>


 

 <h1 class="text-center"><? echo $title ?></h1>
 <div class="container">
      <form class="form-horizontal" action="<?= $action  ?>" method="POST" enctype="multipart/form-data"  >
         <div class="form-group">
            <label class="col-sm-2 control-label" for="username">Username </label>
            <div class="col-sm-10">
               <input type="text" name="username" id="username" class="form-control" value="<?= $useName ?>" />
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-2 control-label" for="password">Password </label>
            <div class="col-sm-10">
               <input type="password" name="password" id="password" class="form-control" value="<?= $password ?>" />
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-2 control-label" for="email">Email </label>
            <div class="col-sm-10">
               <input type="email" name="email" id="email" class="form-control" value="<?= $email ?>" />
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-2 control-label" for="fullname">Full name </label>
            <div class="col-sm-10">
               <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $fullName ?>" />
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-2 control-label" for="userprofile">User profile </label>
            <div class="col-sm-10">
               <input type="file" name="userprofile" id="userprofile" class="form-control"  />
            </div>
         </div>

         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
               <input type="submit" value="Save"  class="btn btn-primary" />
            </div>
         </div>
      </form>
 </div>

<?php 
 include_once ($tmp_path."footer.php");
 ?>
 