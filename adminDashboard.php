<?php session_start();
include_once 'database.php';

if(empty($_SESSION['isLogged'])){

    header("location:adminLogin.php");
}

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
                        <h1 align="center">Welcome to Super Admin Dashboard.</br></h1>
                        <h2 align="center">Welcome <?= $_SESSION['user'] ?></h2>
                        <div align="center"><a href="logout.php" class="btn btn-danger">LOG OUT</a></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center ui-sortable" id="draggableMultiple">
                <div class="col-md-4">
                    <div class="card mb-3 widget-chart">
                        <a href="applicant_list.php">Applicant Database</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 widget-chart">
                        <a href="adminDisplay.php">Admin Database</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>

</body>
<?php include 'footer.php'; ?>