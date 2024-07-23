
<?php
require_once 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email=$password="";
    if(isset($_POST['email'])){
        $email=$_POST['email'];
    }
    if(isset($_POST['password'])){
        $password=$_POST['password'];
    }
    if($email==""||$password=="")
    {
        echo ("Not all fields were entered<br>");
    }
    else
    {
        $q = "SELECT * FROM client WHERE email='$email' AND password='$password'";
        if (isset($pdo)) {
            $result = $pdo->query($q);
            if ($result->rowCount() == 0)
            {
                $error = "Invalid login attempt";
                echo $error;
            } else {
                $result=$result->fetch();
                $id=$result["cli_ID"];
                header("Location: home.php?id=$id");
                exit();
            }
        }
    }
}
?>

<br/>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title > login</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
<section>
    <form action="login.php" method="post">
        <h1>Login</h1>
        <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email"name="email" required>
            <label for="">Email</label>
        </div>
        <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" required>
            <label for="">Password</label>
        </div>
        <button>Log in</button>
        <div class="register">
            <p>Don't have a account <a href="register.php">Register</a></p>
        </div>
    </form>
</section>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>