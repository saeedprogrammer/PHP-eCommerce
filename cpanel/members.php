<?php 
 include_once("init.php"); 
 
 session_start(); 
 include_once ($tmp_path."navBar.php"); 

 $title = "Show members";


 
 include_once ($tmp_path."header.php"); 
 ?>


 

 <h1 class="text-center"><? echo $title ?></h1>
 <div class="container">
     <div class="table-responsive">
         <table class="table table-bordered">
             <tr>
                 <td>ID</td>
                 <td>UserName</td>
                 <td>Email</td>
                 <td>FullName</td>
                 <td>Register date</td>
                 <td>Control</td>
             </tr>

    <?php
        $stmt = $pdo->prepare("SELECT UserID,UserName,Password,Email,FullName ,RigisterDate FROM Users");
       
        $stmt->execute();
        while( $row = $stmt->fetch())
        {
     ?>
       <tr>
                 <td><?=$row["UserID"]?></td>
                 <td><?=$row["UserName"]?></td>
                 <td><?=$row["Email"]?></td>
                 <td><?=$row["FullName"]?></td>
                 <td><?=$row["RigisterDate"]?></td>
                 <td>
                     <a href="member.php?action=edit&ID=<?=$row["UserID"]?>" class="btn btn-success"> Edit</a>
                     <a href="member.php?action=delete&ID=<?=$row["UserID"]?>" class="btn btn-danger confirm"> Delete</a>
                 </td>
        </tr>
     <?php
   
        }
     ?>
        
    

         </table>
     </div>
 </div>

<?php 
 include_once ($tmp_path."footer.php");
 ?>
 