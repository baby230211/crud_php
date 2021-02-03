<?php
$name='';
$price='';
if(isset($_GET['id'])){
  $id=$_GET['id'];
  try
  {
    $db = new PDO('mysql:host=127.0.0.1;dbname=crud', 'root', '1234');
    $db -> query("SET NAMES 'UTF8'");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $affectedRows = $db -> query("SELECT * FROM info WHERE id = '$id'");
    $affectedRows -> setFetchMode(PDO::FETCH_OBJ);
    foreach( $affectedRows as $val )
    {
      $produc = (array)$val;
      // var_dump($produc);
      $name=$produc['name'];
      $price=$produc['price'];
      echo "$name"."$price";
    }
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}else{
  // header('location:crud.php');
}
function edit($id){
  try
  {
    $id=$_GET['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $db = new PDO('mysql:host=127.0.0.1;dbname=crud', 'root', '1234');
    $db -> query("SET NAMES 'UTF8'");
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $affectedRows = $db -> exec("UPDATE info SET name='$name',price='$price' WHERE id = '$id'");
    header('location:crud.php');
  }
  catch(PDOException $e)
  {
    echo $e->getMessage();
  }
}


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="" method="POST">
       <div class="">
         <label>名稱</label>
         <input type="text" name="name" value=<?php echo "$name";?>>

       </div>
       <div class="">
         <label>價錢</label>
         <input type="text" name="price" value=<?php echo "$price"; ?>>

       </div>
       <button type="submit" name="button">儲存</button>
     </form>
     <?php
     // $_REQUEST 代表html表单提交的数据
     // $_REQUEST被设置（isset）
     if ( isset($_GET['id'],$_POST['name'],$_POST['price']))
     {
        echo "$price";
        edit($id);
        // header('loction:crud.php');



     }
     ?>

   </body>
 </html>
