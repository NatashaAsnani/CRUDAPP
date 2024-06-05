<?php
require "classes/Database.php";
require "classes/User.php";
$conn = Database::db_connect();

$id = $_GET['id'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(User::update($conn, $id, $name, $email, $password)){
        header("location: index.php");
    }
}
$user = User::showOne($conn, $id);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row" style="width: 500px;">
            <div class="col border border-success">
                <h2 class="text-success text-center">UPDATE ACCOUNT</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="<?= $user['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value="<?= $user['email'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleFormControlInput1" name="password" value="<?= $user['password'] ?>">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="UPDATE ACCOUNT" class="form-control bg-success text-white" id="exampleFormControlInput1">
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous" defer></script>
</body>
</html>