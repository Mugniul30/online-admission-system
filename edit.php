<?php
include_once 'database.php';
include_once 'validator.php';
$id= $_GET['id'];


if (!empty($_POST)){
    $name = htmlentities($_POST['name'],ENT_QUOTES);
    $phone = htmlentities($_POST['phone'],ENT_QUOTES);
    $email = htmlentities($_POST['email'],ENT_QUOTES);
    $guardian = htmlentities($_POST['guardian'],ENT_QUOTES);
    $p1 = htmlentities($_POST['phone'],ENT_QUOTES);
    $file = $_FILES['file'];
    $fileName = time().rand().".". pathinfo($file['name'], PATHINFO_EXTENSION);
    move_uploaded_file($file['tmp_name'],"uploads/$fileName");
    $trid = htmlentities($_POST['trid'],ENT_QUOTES);
    $payment=htmlentities($_POST['payment'],ENT_QUOTES);
    $exam =htmlentities($_POST['exam'],ENT_QUOTES);
    $department = htmlentities($_POST['department'],ENT_QUOTES);
    $program = htmlentities($_POST['program'],ENT_QUOTES);
    $session = htmlentities($_POST['session'],ENT_QUOTES);
    $year = htmlentities($_POST['year'],ENT_QUOTES);
    $institute=htmlentities($_POST['institute'],ENT_QUOTES);
    $group=htmlentities($_POST['group'],ENT_QUOTES);
    $board=htmlentities($_POST['board'],ENT_QUOTES);
    $grade=htmlentities($_POST['grade'],ENT_QUOTES);
    $degree=htmlentities($_POST['degree'],ENT_QUOTES);


    $error = [];
    if (empty($name)) {
        $error['name'] = "Name field is required!";
    }

    if(empty($phone)){
        $error['phone'] = "phone number field is required!";
    } else if (!isValidphone($phone)) {
        $error['phone'] = "Given phone number is invalid!";
    }

    if (!isValidEmail($email)) {
        $error['email'] = "Given email is invalid";
    }
    if (!isValidguardian($guardian)) {
        $error['email'] = "Given phone number is invalid";
    } elseif(empty($phone)) {
        $error['guardian'] = "Guardian phone number field is required!";
    }
    if (empty($trid)) {
        $error['trid'] = "Transaction ID is required!";
    }


    if (empty($error)){
        $p1 = md5($p1);
        mysqli_query($link, "UPDATE 03_applicant SET applicant_name = '$name', applicant_phone = '$phone', applicant_email = '$email',applicant_program='$program',applicant_department='$department',applicant_session='$session',applicant_guardian='$guardian',applicant_password='$p1',status_03='$payment',applicant_exam='$exam',applicant_trxid='$trid',applicant_year='$year' where applicant_id = $id");
        header("location:applicant_list.php");}


}
$r3 = mysqli_query($link, "SELECT * FROM 03_applicant WHERE applicant_id= $id");
$oldData = mysqli_fetch_assoc($r3);


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


    <div class="main_content_iner ">
        <div class="container-fluid p-0">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="dashboard_header mb_50">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dashboard_header_title">
                                    <h3>Registration</h3>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="modal-content cs_modal">
                                    <div class="modal-header theme_bg_1 justify-content-center">
                                        <h5 class="modal-title text_white">Personal Information</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" value="<?= old('name', $oldData['applicant_name'])?>" placeholder="Full Name">
                                                <?= '<span>'. error('name') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" value="<?= old('email', $oldData['applicant_email'])?>" placeholder="Email">
                                                <?= '<span>'. error('email') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" value="<?= old('phone', $oldData['applicant_phone'])?>" placeholder="Phone">
                                                <?= '<span>'. error('phone') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="guardian" class="form-control" value="<?= old('guardian', $oldData['applicant_guardian'])?>" placeholder="Local Guardian Phone Number">
                                                <?= '<span>'. error('guardian') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <h4> Username: <?= old('username', $oldData['applicant_user_name'])?></h4>

                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="file" class="form-control" value="<?= old('file', $oldData['applicant_file'])?>">
                                                <?= '<span>'. error('file') .'</span>' ?>
                                                <label>Passport Size Image (JPEG Only. Max 100KB)</label>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="modal-content cs_modal">
                                    <div class="modal-header theme_bg_1 justify-content-center">
                                        <h5 class="modal-title text_white">Program Information</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="department" class="form-control" value="<?= old('department', $oldData['applicant_department'])?>" placeholder="Full Name">
                                            <?= '<span>'. error('department') .'</span>' ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="program" class="form-control" value="<?= old('program', $oldData['applicant_program'])?>" placeholder="Full Name">
                                            <?= '<span>'. error('program') .'</span>' ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="session" class="form-control" value="<?= old('session', $oldData['applicant_session'])?>" placeholder="Full Name">
                                            <?= '<span>'. error('session') .'</span>' ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="year" class="form-control" value="<?= old('year', $oldData['applicant_year'])?>" placeholder="Full Name">
                                            <?= '<span>'. error('year') .'</span>' ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exam">Exam Status</label>
                                            <select name="exam" id="exam">
                                                <option value="1">Pending</option>
                                                <option value="0">Attended</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="modal-content cs_modal">
                                        <div class="modal-header theme_bg_1 justify-content-center">
                                            <h5 class="modal-title text_white">Payment Information</h5>
                                        </div>
                                        <div class="card">
                                            <div class="card-content">
                                                <span class="card-title"></span>
                                                <div class="row">

                                                    <div class="col s12 m6">
                                                        <h4>Total Fee : <span class="total-fee">1000</span> BDT</h4>

                                                    </div>
                                                    <div class="col s12 m6">
                                                        <div class="row">
                                                            <p>Please pay the fee to any of the following accounts. Then select
                                                                that account and provide the payment information below.</p>
                                                            <p>
                                                                <b>For mobile banking extra 2% charge will be applicable.</b>
                                                            </p><br>
                                                            <p>
                                                                <label>
                                                                    <input name="payAccount" type="radio" class="from-group with-gap" value="bkash">
                                                                    <span>bKash
                                                            : <strong>01619118414(Personal)</strong></span>
                                                                </label>
                                                            </p>
                                                            <p>
                                                                <label>
                                                                    <input name="payAccount" type="radio" class="from-group with-gap" value="rocket">
                                                                    <span>Rocket
                                                            : <strong>016191184146(Personal)</strong></span>
                                                                </label>
                                                            </p>

                                                            <div class="form-group col s12 m12">
                                                                <input type="text" name="trid" class="from-group" value="<?= old('trid', $oldData['applicant_trxid'])?>">
                                                                <?= '<span>'. error('trid') .'</span>' ?>
                                                                <label>Transaction ID*</label>
                                                            </div>
                                                            <div class="col-sm-lg-12 ">
                                                                        <label for="payment">Payment Status</label>
                                                                        <select name="payment" id="payment">
                                                                            <option value="1">Verified</option>
                                                                            <option value="0">Pending</option>
                                                                        </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="modal-content cs_modal">
                                        <div class="modal-body">
                                            <div align="center"><button class="btn btn-primary">Update</button></div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include 'footer.php' ?>


