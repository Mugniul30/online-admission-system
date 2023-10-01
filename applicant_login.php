<?php session_start();
include_once 'database.php';
if (!empty($_POST)){
    $username = htmlentities($_POST['username'],ENT_QUOTES);
    $p1 = htmlentities($_POST['password'],ENT_QUOTES);


    if (!empty($username)){
        $p1 = md5($p1);
        $result = mysqli_query($link,"SELECT * FROM 03_applicant where applicant_user_name ='$username'");
        $userData = mysqli_fetch_assoc($result);


        if (!empty ($userData) && $userData['applicant_password'] == $p1){
            $_SESSION ['isLogged'] = true;
            $_SESSION ['user'] = $userData['applicant_name'];
            $_SESSION ['id'] = $userData['applicant_id'];
            header("location:applicant_dashboard.php");
        }
    }
}
?>
<?php include 'header.php'?>
<body class="crm_body_bg">

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
    </div>

    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3>Log in</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">

                                <div class="modal-content cs_modal">
                                    <div class="modal-header theme_bg_1 justify-content-center">
                                        <h5 class="modal-title text_white">Log In</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="">
                                                <input type="text" name="username" class="form-control" placeholder="Username">
                                            </div>
                                            <div class="">
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <button class="btn_1 full_width text-center">Log in</button>
                                            <p>Need an account? <a href="applicant_register.php"> Sign Up</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
