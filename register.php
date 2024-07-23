<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="reg.css">
</head>
<body>

<?php
require_once 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $Username=$email=$password="";
    if(isset($_POST["Username"])){
        $Username=$_POST["Username"];
    }
    if(isset($_POST['Email'])){
        $email=$_POST['Email'];
    }
    if(isset($_POST['Password'])){
        $password=$_POST['Password'];
    }

    if($Username==""||$email==""||$password==""){
        echo ("Not all fields were entered<br>");
    }
    else{
        $q = "INSERT INTO client (Username,password,email) VALUES(?, ?, ?)";
        $ps = $pdo->prepare($q);
        $type="A";
        $ps -> bindParam(1, $Username, PDO::PARAM_STR);
        $ps -> bindParam(2, $password, PDO::PARAM_STR);
        $ps -> bindParam(3, $email, PDO::PARAM_STR);
        $ps -> execute();
        $id=$pdo->lastInsertId();
        header("Location: home.php?id=$id");
        exit();
    }
}
?>
<div class="wrapper">

    <form method='POST' action='register.php'  dir="ltr" style="text-align: right">
        <h2>Sign Up</h2>
        <div class="input-group">
            <input type="text" name="Username" required>
            <label for="">Username</label>
        </div>
        <div class="input-group">
            <input type="email" name="Email" required>
            <label for="">Email</label>
        </div>
        <div class="input-group">
            <input type="password" name="Password" required>
            <label for="">Password</label>
        </div>
        <button type="submit">Sign Up</button>
        <div class="signUp-link">
            <p>Already have an account? <a href="login.php" class="signInBtn-link">Sign In</a></p>
        </div>
    </form>
</div>
<script src="re.js"></script>
</body>
</html>