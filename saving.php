<?php
require "db_utils.php";
$errors = [];
$old_data = [];

// foreach ($_POST as  $K=>$V){
//     if(empty($v)){
//         $errors[$k]="{$k} is required";
//     }else{
//         $old_data[$k]=$v;
//     }
// }

if (empty($_POST['name'])) {
    $errors['name'] = "name is required";
} else {
    $old_data['name'] = $_POST['name'];
}

if (empty($_POST['email'])) {
    $errors['email'] = "email is required";
} else {
    $old_data['email'] = $_POST['email'];
}

if (empty($_POST['password'])) {
    $errors['password'] = "Password is required";
}

if (empty($_POST['conpassword'])) {
    $errors['conpassword'] = "conpassword is required";
}

if (empty($_POST['ext'])) {
    $errors['ext'] = "extention is required";
} else {
    $old_data['ext'] = $_POST['ext'];
}

if (empty($_FILES['pic']['tmp_name'])) {
    $errors['pic'] = "Image is required";
} else {
    $ext = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
    if (!in_array($ext, ["jpg", "jpeg", "png"])) {
        $errors['pic'] = "Only JPG, JPEG, PNG files are allowed";
    }
}

if ($errors) {
    $errors = json_encode($errors);
    $url = "Location: index.php?errors={$errors}";
    if ($old_data) {
        $old_data = json_encode($old_data);
        $url .= "&old_data={$old_data}";
    }
    header($url);
} else {

    $image_time=time();
    $temp_name = $_FILES['pic']['tmp_name'];
    $image_name = $_FILES['pic']['name'];
    $image_path = "images/{$image_time}.{$ext}";
    $saved = move_uploaded_file($temp_name, $image_path);

    // var_dump($db);
    // try{
    //     $query="create table `users`(`id` int auto_increment primary key,
    //     `name` varchar(50) not null,
    //     `email` varchar(50) unique,
    //     `password` varchar(50),
    //     `roomno` varchar(50),
    //     `ext` varchar(50),
    //     `pic` varchar(50) null)";

    //     $res=mysqli_query($conn,$query);
    //     var_dump($res);
    // }catch(Exception $e){
    //     var_dump($e->getMessage());
    // }

    try{
        $inst_query = "insert into `users`(`name`,`email`,`password`,`roomno`,`ext`,`pic`)
                values (:username,:useremail,:userpassword,:userroomno,:userext,:userpic)";
        $inst_stmt = $db->prepare($inst_query);
        $inst_stmt->bindParam(':username', $_POST['name']);
        $inst_stmt->bindParam(':useremail', $_POST['email']);
        $inst_stmt->bindParam(':userpassword', $_POST['password']);
        $inst_stmt->bindParam(':userroomno', $_POST['roomno']);
        $inst_stmt->bindParam(':userext', $_POST['ext']);
        $inst_stmt->bindParam(':userpic', $image_path);
        $inst_stmt->execute();
        if($db->lastInsertId()){
            header("Location: Table.php");
        }   
    }catch(PDOException $e){
        echo "Error in inserting database {$e->getMessage()}";
    }
}
