<?php
require_once 'conn.php';
$id=$_GET['id'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>الوجبات </title>
    <link rel="stylesheet" type="text/css" href="home2.css">
</head>
<body dir="rtl">
<header>
    <h1> قائمة الاطعمة </h1>
    <?php echo "<a href='home.php?id=$id'> الواجهة الرئيسية </a></li>"."<br>";?>
    <?php echo "<a href='استعراض%20فاتورة.php?id=$id'> استعراض فاتورة </a></li>";?>
    <?php
    if($id=="9")
    {
        echo "
        <br> <a href='add.php?id=$id' >إضافة وجبة جديدة</a>
        ";
    }
    ?>

</header>
<section id="hero">
    <h2>تناول أطيب الأطعمة في مدينتك</h2>
    <p>استمتع بأشهى الوجبات المقدمة لك </p>
</section>
<section id="menu">
    <div class="item">
        <table border="2" align="center">
            <?php
            $q="select * from meal";
            $arr=$pdo->query($q);
            foreach($arr as $row){
                $or_ID=$row['me_ID'];
                $me_name=$row['me_name'];
                $description=$row['description'];
                $price=$row['price'];
                $re_name=$row['re_name'];
                $re_phone=$row['re_phone'];
                $photo=$row['photo'];
                echo<<<ID_HTML
                <tr>
                <td class="font"> 
                الاسم : $me_name
                <br>
                الوصف: $description
                <br>
                السعر: $price
                <br>
                اسم المطعم: $re_name
                <br>
                رقم المطعم : $re_phone
                <br>
                <br>
                <a href="pay.php?id=$id&mid=$or_ID">شراء</a><br><br>
                <a href="edit.php?id=$id&mid=$or_ID">تعديل</a><br><br>
                <a href="delete.php?id=$id&mid=$or_ID">حذف</a><br><br>
                
               
                </td>
                <td>
                <img src="$photo.jpg" alt="" width=500px>
                </td>
                </tr>
            ID_HTML;
            }
            ?>
        </table>
    </div>
</section>
<footer>
    <p>جميع الحقوق محفوظة &copy; 2024  </p>
</footer>
</body>
</html>