<?php session_start();
include 'database.php';
if(empty($_SESSION['isLogged'])){

    header("location:adminLogin.php");
}


$result = mysqli_query($link, "SELECT * FROM 02_auth_admin");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>
<?php include 'header.php'; ?>
<body>
<div class="crm-body-bg">
    <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
            <a href="index.php"><img src="assets/img/logo.png" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li>
                <a class="has-arrow" href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="assets/img/menu-icon/dashboard.svg" alt="">
                    </div>
                    <span>Super Admin Dashboard</span>
                </a>
    </nav>
    <section class="main_content dashboard_part large_header_bg">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main_content_iner">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="dashboard-header-title">
                            <h3>List of users <a href="adminRegister.php" class="btn btn-sm btn-primary">Add Admin</a></h3>
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                                <?php $srl = 1; foreach ($data as $row): ?>
                                    <tr>
                                        <td><?= $srl++; ?></td>
                                        <td><?= $row['auth_name'] ?></td>
                                        <td><?= $row['auth_username'] ?></td>
                                        <td><?= $row['auth_email'] ?></td>
                                        <td><?= $row['auth_phone'] ?></td>
                                        <td><a href="adminDelete.php?id=<?= $row['auth_id'] ?>" onclick="return confirm('Are you sure to delete this user?')" class="btn btn-danger btn-sm">Delete</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</body>
    <?php include 'footer.php'; ?>






