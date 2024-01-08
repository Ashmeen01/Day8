
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "todo");

if(isset($_SESSION['logged'])){
    header("Location: todo.php");
}else{
    if(isset($_POST['reg'])){
        $fname = $_POST['fname'];
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $sql = "INSERT INTO users VALUES(null, '$fname', '$uname', '$pass')";
        $result = $conn->query($sql);

        if($result){
            header("Location: todo.php");
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
    <title>Registration Page</title>
</head>
<body>
    <h2>Registration Page</h2>
    <form action="register.php" method="post">
        <input type="text" placeholder="Full Name" name="fname"><br><br>
        <input type="text" placeholder="Username" name="uname"><br><br>
        <input type="text" placeholder="Password" name="pass"><br><br>
        <button name="reg">Register</button>
</body>
</html>