<?php
require_once 'conn.php';
$id=$_GET['id'];
$mid=$_GET['mid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$time=date("h:i:s");

echo (string)$time;
    if (isset($_POST["submit"])) {
        $de_id=$_POST["driver"];
        $amount=$_POST["num"];
        $sql="INSERT INTO `order` (cli_ID,me_ID,de_ID,time) VALUES(?,?,?,?)";
        $ps = $pdo->prepare($sql);
        $ps -> bindParam(1, $id, PDO::PARAM_INT);
        $ps -> bindParam(2, $mid, PDO::PARAM_INT);
        $ps -> bindParam(3, $de_id, PDO::PARAM_INT);
        $ps -> bindParam(4, $time, PDO::PARAM_STR);
        $ps -> execute();

        header("Location: استعراض فاتورة.php?id=$id&mid=$mid");
        exit();
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>اذا كنت تريد تاكيد الطلب الرجاء اختر سائق التوصيل ثم حدد الكمية</h1>
<form action="pay.php<?php echo "?id=$id&mid=$mid";  ?>" method="post">
    الكمية:<br>
    <input type="number" min="1" name="num" required><br>
    السائق:<br>
    <select name="driver">
        <option value="1">احمد حمدي</option>
        <option value="2">مصطفى تحسين</option>
        <option value="3">شفيق محمد</option>
    </select><br>
    <input type="submit" value="تأكيد" name="submit">
    <a href="home2.php<?php echo "?id=$id";  ?>">العودة</a>
</form>
</body>
</html>
