<?php   require "database.php";
 $id="";
 if (isset($_POST['id'])){
     $id=$_POST['id'];
     $pdo=database::connect();
     $sql="DELETE from eleve  where id=$id; ";
     $pdo->query($sql);
 }?>