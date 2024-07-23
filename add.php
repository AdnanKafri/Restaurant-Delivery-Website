<!DOCTYPE HTML>
<html>
<head>
    <title>تعديل الوجبات</title>
    <style>
        body {
            background-color: #efc9a4;
            font-family: Arial, sans-serif;
        }

        .color{
            text-align: center;
            padding: 10px;
        }
        .container {
            width: 400px;
            margin: 0 auto;
            border: 10px solid #6a0808;
            text-align: center;
            padding: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }
        .form-group textarea {
            width: 100%;
            height: 100px;
            padding: 5px;
            border: 1px solid #ccc;
        }
        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
    <?php
    if($_GET['id']!=9)
    {
        echo "<br><br><br><br><h1 align='center'>ليس لديك صلاحية لفعل ذلك <br> يجب ان تكون آدمين</h1>";
        exit();
    }
    ?>
    <h1 class="color">تعديل الوجبة</h1>
</head>


<?php
require_once 'conn.php';
$id=$_GET['id'];


if ($_SERVER["REQUEST_METHOD"] == "POST")
{      // $id=$_POST["me_ID"]
    $me_name=$_POST["me_name"];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $re_name=$_POST['re_name'];
    $re_phone=$_POST['re_phone'];
    $photo=$_POST['photo'];
    $sql="insert into meal (me_name,description,price,re_name,re_phone,photo)
        values (?,?,?,?,?,?) ";
    $ps = $pdo->prepare($sql);
    $ps -> bindParam(1, $me_name, PDO::PARAM_STR);
    $ps -> bindParam(2, $description, PDO::PARAM_STR);
    $ps -> bindParam(3, $price);
    $ps -> bindParam(4, $re_name, PDO::PARAM_STR);
    $ps -> bindParam(5, $re_phone, PDO::PARAM_STR);
    $ps -> bindParam(6, $photo, PDO::PARAM_STR);
    $ps -> execute();
    header("Location: home2.php?id=$id");
    exit();
}

// header("Location: home.php?id=$id");
// exit();

?>

<body>
<div class="container">
    <form action="add.php<?php echo "?id=$id";  ?>" method="post">
        <div class="form-group">
            <label for="me_name">اسم الوجبة الجديدة</label>
            <input type="text" id="me_name" name="me_name" required>
        </div>
        <div class="form-group">
            <label for="description">وصف الوجبة الجديدة</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">سعر الوجبة الجديدة</label>
            <input type="number" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="re_name">اسم المطعم</label>
            <input type="text" id="re_name" name="re_name" required>
        </div>
        <div class="form-group">
            <label for="re_phone">رقم المطعم</label>
            <input type="text" id="re_phone" name="re_phone" required>
        </div>
        <div class="form-group">
            <label for="photo">صورة الوجبة</label>
            <select name="photo" id="photo" >
                <option value="kabsa">صورة كبسة</option>
                <option value="Spaghetti">صورة معكرونة</option>
                <option value="bbq">صورة مشاوي</option>
                <option value="mix">صورة مقبلات</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit"><a href="add.php?id=$id" class="btn"></a>Submit</button>
        </div>

    </form>
</div>
</body>
</html>
