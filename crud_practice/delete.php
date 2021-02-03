<?php

if(isset($_GET['id'])){
  $id=$_GET['id'];

  try
  {
    $db = new PDO('mysql:host=127.0.0.1;dbname=crud', 'root', '1234');
    $db -> query("SET NAMES 'UTF8'");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $affectedRows = $db -> exec("DELETE FROM `info` WHERE id = '$id'");

    if( $affectedRows == 0 ) //代表資料庫已無此筆資料，所以沒有更動到資料庫，故回傳0筆
    {
      echo '資料庫已無此資料。';
    }
    else //代表已將資料從資料庫中刪除，回傳刪除之筆數
    {
      echo '刪除成功，總共刪除'.$affectedRows.'筆資料。';
      header('location:crud.php');
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }

}else{
  header('location:crud.php');
}



 ?>
