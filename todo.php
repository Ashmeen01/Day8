<?php
session_start();
//Add todo
$conn = new mysqli("localhost", "root", "", "todo");
if(!isset($_SESSION['logged'])){
    header("Location: index.php");
}else{
    if(isset($_POST['add'])){
        //Get current user
        $user = $_SESSION['logged'];
        $query = "SELECT * FROM todo.users WHERE uname='$user'";
        $result = $conn->query($query);

        $userId = $result->fetch_assoc()['id'];

        $todo = $_POST['todo'];

        $sql = "INSERT INTO todo (userId, todo) VALUES ('$userId', '$todo')";
        $res = $conn->query($sql);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <form action="todo.php" method="post">
        <input type="text" placeholder="Write a todo" name="todo"><br><br>
        <button type="submit" name="add">Add</button>
    </form><br><br><hr>

    <table>
        <tr>
            <th>SNO.</th>
            <th>Todo</th>
            <th colspan="2">Action</th>
        </tr>
        <?php
        $sn = 1;

        $user = $_SESSION['logged'];
        // $user = $_SESSION['logged'];
        $query = "SELECT * FROM todo.users WHERE uname='$user'";
        $result = $conn->query($query);

        $userId = $result->fetch_assoc()['id'];
        $query = "SELECT todo FROM todo.todo WHERE userId='$userId'";
        $result = $conn->query($query);

       while($result->fetch_assoc()['todo']): ?>
        <tr>
            <td><?=$sn++;?></td>
            <td><?=$todo; ?></td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <?php endwhile; ?>
    </table>
    
</body>
</html>