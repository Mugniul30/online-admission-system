<?php session_start();
include_once 'database.php';

if(empty($_SESSION['isLogged'])){

    header("location:adminLogin.php");
}
$result = mysqli_query($link,"SELECT * FROM 03_applicant");
$data= mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                                <h2 align="center">Hello <?= $_SESSION['user'] ?></h2>
                                <div align="center"><a href="logout.php" class="btn btn-danger">LOG OUT</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center ui-sortable" id="draggableMultiple">
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="CSElist.php">CSE</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="LAWlist.php">LAW</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="BBAlist.php">BBA</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="FETlist.php">FET</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="BARCHlist.php">BARCH</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="ENGLISHlist.php">ENGLISH</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="BPHAMlist.php">BPHAM</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3 widget-chart">
                                <a href="JCMSlist.php">JCMS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </body>
<?php include 'footer.php'; ?>