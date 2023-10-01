<?php session_start();

if(empty($_SESSION['isLogged'])){

    header("location:applicant_login.php");
}

$id = $_SESSION['id'];
include 'database.php';
$result = "SELECT * FROM 03_applicant where applicant_id ='$id'";
$r1 = mysqli_query($link,$result);
while($row = mysqli_fetch_array($r1))
{
    ?>


<?php include 'header.php'?>


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
                    <span>Applicant Dashboard</span>
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
                            <h1 align="center">Welcome to Applicant Dashboard.</br></h1>
                            <h2 align="center">Welcome <?= $_SESSION['user'] ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center ui-sortable" id="draggableMultiple">
                    <div class="col-md-4">
                        <div class="card mb-3 widget-chart">
                            <a href="admitpdf.php?id=<?= $_SESSION['id'] ?>" class="btn btn-dark">Download Admit Card</a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-3 widget-chart">
                            <a href="logout.php" class="btn btn-danger">LOG OUT</a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="dashboard-header-title">
                            <h3 align="center">Applicant Information</br></h3>
                            <h5 align="center">Name: <?= $_SESSION['user'] ?></br></h5>
                            <h5 align="center">Contact: <?= $row['applicant_phone'] ?></br></h5>
                            <h5 align="center">User Name: <?= $row['applicant_user_name'] ?></br></h5>
                            <h5 align="center">Email: <?= $row['applicant_email'] ?></h5>
                            <h5 align="center">Department: <?= $row['applicant_department']?></br></h5>
                            <h5 align="center">Program: <?= $row['applicant_program'] ?></br></h5>
                            <h5 align="center">Session: <?= $row['applicant_session'] ?></br></h5>
                            <h5 align="center">Year: <?= $row['applicant_year']?></br></h5>
                            <h5 align="center">Guardian Contact: <?= $row['applicant_guardian']?></br></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>

<?php } ?>


<?php include 'footer.php'?>