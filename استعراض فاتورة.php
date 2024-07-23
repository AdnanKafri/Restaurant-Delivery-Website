<?php
require_once 'conn.php';
$id=$_GET['id'];
$sum=0;
//echo $id;
$result = $pdo->query("SELECT * FROM `order` WHERE cli_ID=$id");

while ($row = $result->fetch()) {
    $me_ID = $row['me_ID'];
    $res = $pdo->query("SELECT me_name,price FROM meal where me_ID='$me_ID'");
    $res = $res->fetch();
//    echo "<pre>";
//    print_r($res);
//    echo "</pre>";
    $name = $res['me_name'];
    $price = $res['price'];
    $res1 = $pdo->query("SELECT time FROM `order` where me_ID='$me_ID' and cli_ID=$id");
    $res1 = $res1->fetch();
    $time = $res1['time'];


?>
<html>
<head>
    <title>استعراض فاتورة</title>
    <link rel="stylesheet" type="text/css" href="استعراض%20فاتورة.css">
</head>
<body>
<div class='center'>
    <table border="1">
        <tr>
            <th>اسم الوجبة</th>
            <th>سعر الوجبة</th>
            <th>الوقت </th>
        </tr>
        <tr>
            <?php echo "<td>$name</td>";?>
            <?php echo "<td>$price</td>";
          $sum+=$price;
          ;?>
          <?php echo "<td>$time</td>";?>

           <?php
}
//           echo "
//                      <td>$name</td>
//                      <td>$price</td>
//                      <td>$time</td>
//           ";
//                             $sum+=$price;
           ?>
        </tr>
    </table>
    السعر الاجمالي:
    <?php echo $sum;?>
</div>
<a href="home2.php?id=<?php echo $id;?>">العودة للصفحة الرئيسية</a>
</body>
</html>