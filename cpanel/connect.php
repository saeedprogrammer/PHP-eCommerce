<?php

try
{
    $pdo = new PDO("mysql:host=data-base;dbname=eCOMMERCE_APP_DB","MYSQL_USER" , "MYSQL_PASSWORD",
    [
      PDO::ATTR_EMULATE_PREPARES => false ,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
     ]);
    
     $pdo->setAttribute( PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
     

    
 
}
catch(PDOException $excep)
{
    echo $excep->getMessage();
}

?>