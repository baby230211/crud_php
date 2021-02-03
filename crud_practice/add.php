<?php
  $name="";
  $price="";
  $id=0;
  // $db=mysqli_connect('localhost:8000','root','1234','crud');

  // try {
  //   $db= new PDO('mysql:host=127.0.0.1;dbname=crud', 'root', '1234');
  //   $db->query("SET NAMES 'UTF8'");
  //   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   $query="INSERT INTO info (name, address) VALUES ('$name', '$address')";
  //
  //   $affectedRows=$db -> exec($query);
  // } catch (PDOException $e) {
  //   echo $e->getMessage();
  //
  // }
// 查詢資料
  function find(){
    try
    {
      $db = new PDO('mysql:host=127.0.0.1;dbname=crud', 'root', '1234');
      $db -> query("SET NAMES 'UTF8'");
      $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM info";
      $result = $db -> query($sql); //查詢
      $result -> setFetchMode(PDO::FETCH_OBJ);
      return $result;
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
  function delete($id){
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
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }


  if(isset( $_POST['name'] ) && isset( $_POST['price'] ))
  {
    $name=$_POST['name'];
    $price=$_POST['price'];
    try {
      $db= new PDO('mysql:host=127.0.0.1;dbname=crud', 'root', '1234');
      $db->query("SET NAMES 'UTF8'");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query="INSERT INTO info (name, price) VALUES ('$name', '$price')";

      $affectedRows=$db -> exec($query);

    } catch (PDOException $e) {
      echo $e->getMessage();

    }

    // $query="INSERT INTO info (name, address) VALUES ('$name', '$address')";
    // mysqli_query($db,$query);
    // header('location:crud.php');
  }else {

    echo "輸入錯誤";
  }
header('location:crud.php');
 ?>
