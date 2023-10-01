<?php session_start();
include_once 'database.php';
if (!empty($_POST)){
    $username = htmlentities($_POST['username'],ENT_QUOTES);
    $p1 = htmlentities($_POST['password'],ENT_QUOTES);


    if (!empty($username)){
        $p1 = md5($p1);
        $result = mysqli_query($link,"SELECT * FROM 01_super_admin where admin_username ='$username'");
        $userData = mysqli_fetch_assoc($result);


        if (!empty ($userData) && $userData['admin_password'] == $p1){
            $_SESSION ['isLogged'] = true;
            $_SESSION ['user'] = $userData['admin_name'];
            header("location:adminDashboard.php");
        }
    }
}
?>
<?php include 'header.php'; ?>
<body class="crm_body_bg">

<div class="logo d-flex justify-content-between">
    <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
    <div class="sidebar_close_icon d-lg-none">
        <i class="ti-close"></i>
    </div>
</div>
<div class="container">
    <h2 align="center">Log in</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div align="center"><button class="btn btn-primary">Log in</button></div>
            </form>
        </div>
    </div>
</div>
</body>
<?php include 'footer.php'; ?>