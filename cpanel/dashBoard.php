<?php 
 session_start(); 
 $title = "DashBoard";
 include_once("init.php"); 
 include_once ($tmp_path."navBar.php"); 
 include_once ($tmp_path."header.php"); 
?>
<div class="container text-center">
   <h1> <?= $title ?> </h1>
   <div class="row">
       <div class="col-md-3">
         <div class="stat">
            Total comments
            <div>3500</div>
         </div>
      </div>
   

       <div class="col-md-3">
         <div class="stat">
            Total comments
            <div>3500</div>
         </div>
      </div>
   
 
       <div class="col-md-3">
         <div class="stat">
            Total comments
            <div>3500</div>
         </div>
      </div>
   
      <div class="col-md-3">
         <div class="stat">
            Total comments
            <div>3500</div>
         </div>
      </div>
   </div>

<?
 include_once ($tmp_path."footer.php");
 ?>