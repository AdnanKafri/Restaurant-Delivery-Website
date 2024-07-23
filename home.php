<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>توصيل الطلبات</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
<header>
    <nav>
        <h1 dir="rtl" align="center">اهلا بكم في موقعنا , نتمنى لكم وجبة هنيئة</h1>
    </nav>
</header>
<?php
require_once 'conn.php';
$id=$_GET['id'];
echo<<<ID_HTML
        <section class="hero">
            <h1>توصيل الطلبات<br><a href="home2.php?id=$id" class="btn">أطلب الآن</a></h1>
        <br>
            <img src="1704577423978%20-%20نسخ%20.jpg">
        </section>
    ID_HTML;
?>
<footer>
    <p>جميع الحقوق محفوظة &copy; 2024</p>

</footer>
</body>
</html>
