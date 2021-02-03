<?php
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
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
     <table style="padding:5px;width:600px;border:1px solid red;background-color:#ccc;text-align:center;">
<?php
  $result=find();
  $new=array();
  foreach ($result as $key => $value):
    $array = (array)$value;
    $new=$array;
    // var_dump($new);
    // code...


 ?>

   <tr>
     <td style="width:30%;">
       <p><?php echo $new['name']; ?></p>
     </td>
     <td style="width:30%">
       <p>單價 : <?php echo $new['price']; ?> 元</p>
     </td>
     <td>
       <a href="edit.php?id=<?php echo $new['id']; ?>">
         <button type="submit">編輯</button>
       </a>
     </td>
     <td>
       <a href="delete.php?id=<?php echo $new['id']; ?>">
         <button type="submit">移除</button>
       </a>
     </td>

   </tr>


<?php endforeach; ?>
 </table>





    <form class="" action="add.php" method="post">
      <div class="">
        <label>名稱</label>
        <input type="text" name="name" value="">

      </div>
      <div class="">
        <label>價錢</label>
        <input type="text" name="price" value="">

      </div>
      <button type="submit" name="button">儲存</button>
    </form>

  </body>
</html>
