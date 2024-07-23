<!DOCTYPE html>
<html>
<head>
    <title>تعديل الوجبة</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<h1 class="color">تعديل الوجبة</h1>

<?php
require_once 'conn.php';
//$id=$_GET['id'];
//echo<<<ID_HTML
    ?>
   <div id="foods-container">
    <div class="food-item">
        <img class="food-image" src="IMG-20240109-WA0015.jpg" alt="برغر">
        <div>
            <a href="update.php?id=$id">تعديل</a><br><br>
            <a href="update.php?id=$id">حذف</a>
        </div>
    </div>

    <div class="food-item">
        <img class="food-image" src="IMG-20240109-WA0016.jpg" alt="زنجر">
        <div>
            <a href="update.php?id=$id">تعديل</a><br><br>
            <a href="update.php?id=$id">حذف</a>
        </div>
    </div>

    <div class="food-item">
        <img class="food-image" src="IMG-20240109-WA0014.jpg" alt="شاورما">
        <div>
            <a href="update.php?id=$id">تعديل</a><br><br>
            <a href="update.php?id=$id">حذف</a>
        </div>
    </div>

    <div class="food-item">
        <img class="food-image" src="1704577497445.jpg" alt="فاهيتا">
        <div>
            <a href="update.php?id=$id">تعديل</a><br><br>
            <a href="update.php?id=$id">حذف</a>
        </div>
    </div>
</div>
   // ID_HTML;
//?>
</body>
</html>
