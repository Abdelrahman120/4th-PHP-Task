<?php
require "db_utils.php";

$id = $_GET['id'];
$query = "SELECT * FROM `users` WHERE id=:id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    
    echo "User not found";
    exit;
}

$errors = [];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Update Page</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Update Your Data</h1>
        <form class="pb-5" action="update_data.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" class="form-control" name="id"  aria-describedby="emailHelp" value="<?php echo $row['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['name']; ?>">
                <span class="text-danger">
                    <?php echo isset($errors['name']) ? $errors['name'] : ''; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['email']; ?>">
                <span class="text-danger">
                    <?php echo isset($errors['email']) ? $errors['email'] : ''; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                <span class="text-danger">
                    <?php echo isset($errors['password']) ? $errors['password'] : ''; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input name="conpassword" type="password" class="form-control" id="exampleInputPassword1">
                <span class="text-danger">
                    <?php echo isset($errors['conpassword']) ? $errors['conpassword'] : ''; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Room No.</label>
                <select class="form-control" name="roomno" id="">
                    <option value="Application1" <?php echo $row['roomno'] == 'Application1' ? 'selected' : ''; ?>>Application1</option>
                    <option value="Application2" <?php echo $row['roomno'] == 'Application2' ? 'selected' : ''; ?>>Application2</option>
                    <option value="cloud" <?php echo $row['roomno'] == 'cloud' ? 'selected' : ''; ?>>cloud</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ext</label>
                <select class="form-control" name="ext" id="">
                    <option value="jpg" <?php echo $row['ext'] == 'jpg' ? 'selected' : ''; ?>>JPG</option>
                    <option value="jpeg" <?php echo $row['ext'] == 'jpeg' ? 'selected' : ''; ?>>JPEG</option>
                    <option value="png" <?php echo $row['ext'] == 'png' ? 'selected' : ''; ?>>PNG</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Pic</label>
                <input name="pic" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span class="text-danger">
                    <?php echo isset($errors['pic']) ? $errors['pic'] : ''; ?>
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Reset</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>