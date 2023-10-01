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
                <a href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="assets/img/menu-icon/dashboard.svg" alt="">
                    </div>
                    <span>Latest Notices</span>
                </a>
                <a href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="assets/img/menu-icon/2.svg" alt="">
                    </div>
                    <span>Career Information</span>
                </a>
                <a href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="assets/img/menu-icon/10.svg" alt="">
                    </div>
                    <span>Tuition & Fees</span>
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

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="dashboard_header mb_50">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dashboard_breadcam">
                                        <p><a href="https://www.sub.ac.bd/">Visit SUB</a></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="dashboard_breadcam text-end">
                                        <p><a href="adminPortal.php">Admin Portal</a></p>
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
                                        <div class="modal-body">
                                            <h1 align="center">Welcome To State University Of Bangladesh.</h1>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3">
                                                <a type="button" class="btn btn-success  mb-3" href="applicant_login.php">Log In</a>
                                            </div>
                                            <div class="col-lg-3">
                                                <a type="button" class="btn btn-success  mb-3" href="applicant_register.php">Apply Now</a>
                                            </div>
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