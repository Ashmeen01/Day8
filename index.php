<?php
session_start();
$conn = new mysqli("localhost", "root", "", "todo");
if(isset($_SESSION['logged'])){
    header("Location: todo.php");
}else{
    if(isset($_POST['login'])){
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $sql = "SELECT * FROM users WHERE uname='$uname' AND password='$pass'";
        $res = $conn->query($sql);

        

        // if(mysqli_num_rows($res)==1){
        if($res->num_rows==1){
            $_SESSION['logged'] = $uname;
            header("Location: todo.php");
           
            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h2>Login Page</h2>
    <form action="index.php" method="post">
        <!-- <input type="text" placeholder="Full Name" name="fname"><br><br> -->
        <input type="text" placeholder="Username" name="uname"><br><br>
        <input type="text" placeholder="Password" name="pass"><br><br>
        <button name="login">Login</button>
</body>
</html>