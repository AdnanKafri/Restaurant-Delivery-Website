<html>
<head>


</head>

<body>
<?php
require_once "conn.php";
echo "Processing Form!<br>";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    # process a GET request
    //echo "GET Method is used";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    # process a POST request
    echo "POST Method is used<br>";
    $me_name=$description=$price=$rw_ID ="";

    if(isset($_POST['me_name'])){
        $me_name=$_POST['me_name'];
    }
    if(isset($_POST['description'])){
        $description=$_POST['description'];
    }
    if(isset($_POST['price'])){
        $price=$_POST['price'];
    }
    if(isset($_POST['re_name'])){
        $re_ID=$_POST['re_name'];
    }
    if(isset($_POST['re_phone'])){
        $re_ID=$_POST['re_phone'];
    }

    if(isset($_POST['photo'])){
        $re_ID=$_POST['photo'];
    }
    if ($me_name == "" || $description =="" || $price ==""  || $re_name ==""   || $re_phone==""  || $photo ==""   ){
        $error = 'Not all fields were entered<br><br>';
        die($error);
    }

    else {
        //يمكن اضافة البيانات//
        $q="INSERT INTO meal (me_name,description,price,re_name,re_phone,photo) VALUES('$me_name', '$description','$price','$re_name',$re_phone,$photo)";
        $pdo->query($q);
        die("ok");
    }
}
?>

<br/>



<!DOCTYPE html>
<html>
<head>
    <title>إضافة وجبة</title>
    <link rel="stylesheet" type="text/css" href="اضافة%20وجبة.css">
    <meta charset="UTF-8">
</head>
<body dir="rtl">
<h1>إضافة وجبة</h1>

<form action="add_meal.php" method="post">
    <label for="me_name">اسم الوجبة:</label>
    <input type="text" id="me_name" name="me_name"><br><br>

    <label for="description">وصف الوجبة:</label>
    <input type="text" id="description" name="description"><br><br>

    <label for="price">سعر الوجبة:</label>
    <input type="text" id="price" name="price"><br><br>

    <label for="re_name">اسم المطعم:</label>
    <input type="text" id="re_name" name="re_name"><br><br>

    <label for="re_phone">رقم المطعم:</label>
    <input type="text" id="re_phone" name="re_phone"><br><br>

    <label for="photo">اسم الصورة:</label>
    <input type="text" id="photo" name="photo"><br><br>


    <input type="submit" value="إضافة">

</form>
</body>
</html>



