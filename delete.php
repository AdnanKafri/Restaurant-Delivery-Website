
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
    <h1 class="color">حذف وجبة</h1>
</head>


<?php
require_once 'conn.php';
$id=$_GET['id'];
$mid=$_GET['mid'];
//echo "$id <br> $mid";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{      // $id=$_POST["me_ID"]

    $sql="DELETE FROM meal WHERE me_ID = ?";
    $ps = $pdo->prepare($sql);
    $ps -> bindParam(1, $mid, PDO::PARAM_INT);

    $ps -> execute();
    header("Location: home2.php?id=$id");
    exit();
}
?>

<body>
<div class="container">
    <form action="delete.php<?php echo "?id=$id&mid=$mid";  ?>" method="post">
        <h3>
            هل انت متاكد انك تريد حذف هذه الوجبة ؟
        </h3>
        <div class="form-group">
            <button type="submit"><a  class="btn"></a>حذف</button>
        </div>
        <div class="form-group">
            <a href="home2.php<?php echo "?id=$id";  ?>" class="btn">العودة</a>
        </div>

    </form>

</div>
</body>
</html>
