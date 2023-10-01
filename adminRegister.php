<?php
include_once 'database.php';
include_once 'validator.php';
if (!empty($_POST)){
    $name = htmlentities($_POST['name'],ENT_QUOTES);
    $username = htmlentities($_POST['username'],ENT_QUOTES);
    $phone = htmlentities($_POST['phone'],ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $p1 = htmlentities($_POST['password'],ENT_QUOTES);
    $p2 = htmlentities($_POST['cpassword'],ENT_QUOTES);
    $file = $_FILES['file'];

    $fileName = time().rand().".". pathinfo($file['name'], PATHINFO_EXTENSION);
    move_uploaded_file($file['tmp_name'],"uploads/$fileName");

    if (!empty($username) && $p1==$p2){
        $p1 = md5($p1);
        mysqli_query($link,"INSERT INTO 01_super_admin (admin_name,admin_username,admin_email,admin_phone,admin_password,admin_file) values ('$name','$username','$email','$phone','$p1','$fileName')");
        header("location:adminLogin.php");}

}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2 align="center">Registration</h2>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" value=" <?= old('name') ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" value="<?= old('username') ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">phone</label>
                    <input type="text" name="phone" placeholder="+8801XXXXXXXXX" value="<?= old('phone') ?>" class="form-control">
                    <?= '<span>'. error('phone') .'</span>' ?>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="yourname@example.com" value="<?= old('email') ?>" class="form-control">
                    <?= '<span>'. error('email') .'</span>' ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?= old('password') ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" name="cpassword" value="<?= old('password') ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Upload Passport Size Image</label>
                    <input type="file" name="file" value="<?= old('file') ?>" class="form-control">
                </div>
                <button class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</div>
</body>
</html>