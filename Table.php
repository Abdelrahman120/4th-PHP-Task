<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
require "db_utils.php";
if($db){
    try{
        $select_query = "Select * from users;";
        $stmt = $db->prepare($select_query);
        $res = $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        echo "{$e->getMessage()}";
    }
}
echo "<h1 class='text-center'>Data</h1>";
if ($users){
    echo "<table class='table'> 
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Room No.</th>
                <th>Ext</th>
                <th>Picture</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>";

    foreach ($users as $user){
        echo "<tr>
            <td>{$user['id']}</td>
            <td>{$user['name']}</td>
            <td>{$user['email']}</td>
            <td>{$user['password']}</td>
            <td>{$user['roomno']}</td>
            <td>{$user['ext']}</td>
            <td><img src='{$user['pic']}' width='100' height='100'></td>
            <td><a href='update.php?id={$user['id']}' class='btn btn-primary'>Update </a> </td>
            <td><a href='delete.php?id={$user['id']}' class='btn btn-danger'>Delete </a> </td>
        </tr>";
    }
    echo "</table>";
}
?>