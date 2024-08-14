<?php
if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'], true);
}

if (isset($_GET['old_data'])) {
    $old_data = json_decode($_GET['old_data'], true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>TASK4</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center">Task 4</h1>
        <form class="pb-5" action="saving.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php $eval = isset($old_data['name']) ? $old_data['name'] : "";echo $eval; ?>">
                <span class="text-danger">
                    <?php $error = isset($errors['name']) ? $errors['name'] : '';
                    echo $error; ?>
                </span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php $eval = isset($old_data['email']) ? $old_data['email'] : "";echo $eval; ?>">
                <span class="text-danger">
                    <?php $error = isset($errors['email']) ? $errors['email'] : '';
                    echo $error; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                <span class="text-danger">
                    <?php $error = isset($errors['password']) ? $errors['password'] : '';
                    echo $error; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input name="conpassword" type="password" class="form-control" id="exampleInputPassword1">
                <span class="text-danger">
                    <?php $error = isset($errors['conpassword']) ? $errors['conpassword'] : '';
                    echo $error; ?>
                </span>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Room No.</label>
                <select class="form-control" name="roomno" id="">
                    <option value="Application1">Application1</option>
                    <option value="Application2">Application2</option>
                    <option value="cloud">cloud</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ext</label>
                <select class="form-control" name="ext" id="">
                    <option value="jpg">JPG</option>
                    <option value="jpeg">JPEG</option>
                    <option value="png">PNG</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Pic</label>
                <input name="pic" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span class="text-danger">
                    <?php $error = isset($errors['pic']) ? $errors['pic'] : '';
                    echo $error; ?>
                </span>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>