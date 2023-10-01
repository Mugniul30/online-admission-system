<?php
include_once 'database.php';
$r1= "SELECT applicant_id FROM 03_applicant";
$id = mysqli_query($link,$r1);
include_once 'validator.php';
if (!empty($_POST)){
    $name = htmlentities($_POST['name'],ENT_QUOTES);
    $phone = htmlentities($_POST['phone'],ENT_QUOTES);
    $email = htmlentities($_POST['email'],ENT_QUOTES);
    $cemail = htmlentities($_POST['email'],ENT_QUOTES);
    $session = htmlentities($_POST['session'],ENT_QUOTES);
    $department = htmlentities($_POST['department'],ENT_QUOTES);
    $program = htmlentities($_POST['program'],ENT_QUOTES);
    $guardian = htmlentities($_POST['guardian'],ENT_QUOTES);
    $p1 = htmlentities($_POST['phone'],ENT_QUOTES);
    $year = htmlentities($_POST['year'],ENT_QUOTES);
    $file = $_FILES['file'];
    $fileName = time().rand().".". pathinfo($file['name'], PATHINFO_EXTENSION);
    move_uploaded_file($file['tmp_name'],"uploads/$fileName");
    $trid = htmlentities($_POST['trid'],ENT_QUOTES);
    $dob=htmlentities($_POST['dob'],ENT_QUOTES);
    $bg=htmlentities($_POST['bg'],ENT_QUOTES);
    $gender=htmlentities($_POST['gender'],ENT_QUOTES);
    //$degree=htmlentities($_POST['degree'],ENT_QUOTES);
    //$group= htmlentities($_POST['group_name'],ENT_QUOTES);
    //$grade = htmlentities($_POST['grade'],ENT_QUOTES);
    //$board= htmlentities($_POST['board'],ENT_QUOTES);
    //$institute= htmlentities($_POST['institute'],ENT_QUOTES);
    //$group= htmlentities($_POST['group'],ENT_QUOTES);




    $username = "ADM_".rand()."_".$department."_".$session."_".$program;
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
    }elseif (empty($email)) {
        $error['email'] = "Email field is required!";
    }
    if (!isValidguardian($guardian)) {
        $error['guardian'] = "Given phone number is invalid";
    } elseif(empty($phone)) {
        $error['guardian'] = "Guardian phone number field is required!";
    }
    if (empty($trid)) {
        $error['trid'] = "Transaction ID is required!";
    }
    if (isset($_POST['register']) && !empty($username) && empty($error) && $email==$cemail){
        $p1 = md5($p1);
        mysqli_query($link, "INSERT INTO 03_applicant (applicant_name,applicant_phone,applicant_email,applicant_year,applicant_session,applicant_department,applicant_program,applicant_guardian,applicant_password,applicant_file,applicant_user_name,applicant_trxid) values ('$name','$phone','$email','$year','$session','$department','$program','$guardian','$p1','$fileName','$username','$trid')");


        foreach ($_POST['degree'] as $key => $value) {

            $query1 = "INSERT INTO 04_academic (degree,applicant_user_name,group_name,grade,board,institute) VALUES ('$value','$username','".$_POST['group'][$key]."','".$_POST['grade'][$key]."','".$_POST['board'][$key]."','".$_POST['institute'][$key]."')";
            mysqli_query($link, $query1);
        }
        header("location:registration_success.php");
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
                                                <input type="text" name="name" class="form-control" value="<?= old('name') ?>" placeholder="Full Name">
                                                <?= '<span>'. error('name') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" name="dob" class="form-control" value="<?= old('dob') ?>" placeholder="Date of birth">
                                                <?= '<span>'. error('dob') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="bg" class="form-control" value="<?= old('bg') ?>" placeholder="Blood Group">
                                                <?= '<span>'. error('dob') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <p align="left">Gender:</p>
                                                <select name="gender" class="form-control">
                                                    <option name="gender" value="M">Male</option>
                                                    <option name="gender" value="F">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" value="<?= old('email') ?>" placeholder="Email">
                                                <?= '<span>'. error('email') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="cemail" class="form-control" value="<?= old('cemail') ?>" placeholder="Confirm Email">
                                                <?= '<span>'. error('cemail') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" value="<?= old('phone') ?>" placeholder="Phone">
                                                <?= '<span>'. error('phone') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="guardian" class="form-control" value="<?= old('guardian') ?>" placeholder="Local Guardian Phone Number">
                                                <?= '<span>'. error('guardian') .'</span>' ?>
                                            </div>
                                            <div class="form-group">
                                                <input type="file" name="file" class="form-control" value="<?= old('file') ?>">
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
                                        <h5 class="modal-title text_white">Academic Information</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <table class="table table-bordered" id="table-field">
                                                <tr>
                                                    <td>
                                                        <select name="degree[]" id="degree">
                                                            <option value="null">choose your degree...</option>
                                                            <option value="SSC">SSC / Equivalent</option>
                                                            <option value="HSC">HSC / Equivalent</option>
                                                            <option value="HONS">BACHELOR / Equivalent</option>
                                                            <option value="MASTERS">MASTERS</option>
                                                            <option value="other">other</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="institute[]" class="form-control" value="<?= old('institute') ?>" placeholder="Institute">
                                                        <?= '<span>'. error('institute') .'</span>' ?></td>
                                                    <td>
                                                        <input type="text" name="group[]" class="form-control" value="<?= old('group') ?>" placeholder="Group">
                                                        <?= '<span>'. error('group') .'</span>' ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="board[]" class="form-control" value="<?= old('board') ?>" placeholder="Board">
                                                        <?= '<span>'. error('board') .'</span>' ?>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="grade[]" class="form-control" value="<?= old('grade') ?>" placeholder="Grade (Out of 5.00)">
                                                        <?= '<span>'. error('grade') .'</span>' ?>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger" type="button" name="add" value="add" id="add">Add</button>
                                                    </td>
                                                </tr>
                                            </table>
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
                                            <label for="department">Select Department</label>
                                            <select name="department" id="department">
                                                <option value="null">Choose a department...</option>
                                                <option value="CSE">Dept. Computer Science & Engineering</option>
                                                <option value="ARCH">Dept. of Architecture</option>
                                                <option value="BA">Dept. of Business Administration</option>
                                                <option value="ENGLISH">Dept. of English</option>
                                                <option value="FET">Dept. of Food Engineering & Technology</option>
                                                <option value="LAW">Dept. of Law Studies</option>
                                                <option value="PHAM">Dept. of Pharmacy</option>
                                                <option value="JCMS">Dept. of Journalism, Communication and Media Studies (JCMS)</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="CSE">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_cse">
                                                <option value="UG">BSC in Computer Science & Engineering</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="ARCH">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_arch">
                                                <option value="UG">B. Arch – Bachelor of Architecture</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="BA">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_ba">
                                                <option value="UG">BBA – Bachelor of Business Administration</option>
                                                <option value="PG">MBA – Masters of Business Administration</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="ENGLISH">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_eng">
                                                <option value="UG">BA (Hons) in English</option>
                                                <option value="PG">MA in English</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="FET">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_fet">
                                                <option value="UG">B.Sc. in Food Engineering & Technology</option>
                                                <option value="PG">M.Sc. in Food Engineering and Technology</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="LAW">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_law">
                                                <option value="UG">LL.B. (Hons) – Bachelor of Laws</option>
                                                <option value="PG">LL.M. – Master of Laws</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="PHAM">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_pham">
                                                <option value="UG">B. Pharm – Bachelor of Pharmacy</option>
                                                <option value="PG">M. Pharm – Master of Pharmacy</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
                                        <div class="form-group info" id="JCMS">
                                            <label for="program">Program</label>
                                            <select name="program" id="program_jcms">
                                                <option value="UG">BSS (Hons) in Journalism, Communication and Media Studies (JCMS)</option>
                                            </select> </br>
                                            <label for="Session">Session</label>
                                            <select name="session" id="session">
                                                <option name="session" value="FALL">Fall</option>
                                                <option name="session" value="SUMMER">Summer</option>
                                                <option name="session" value="SPRING">Spring</option>
                                            </select></br>
                                            <label for="Year">Year</label>
                                            <select name="year" id="year">
                                                <option name="year" value="2022">2022</option>
                                                <option name="year" value="2023">2023</option>
                                            </select>
                                        </div>
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
                                                            <input type="text" name="trid" class="from-control" value=""<?= old('trid') ?>">
                                                            <?= '<span>'. error('trid') .'</span>' ?>
                                                            <label>Transaction ID*</label>
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
                                        <div align="center"><button class="btn btn-primary" name="register">Register</button></div>
                                        <p>Already have an account? <a href="applicant_login.php">Log in</a></p>
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


