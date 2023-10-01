<?php session_start();
include 'validator.php';
if(empty($_SESSION['isLogged'])){

    header("location:adminLogin.php");
}


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Admission System</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script type="text/javascript" src="assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="assets/js/jquery1-3.4.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/bootstrap1.min.css">
</head>
<body>
<nav class="navbar navbar-light">
    <div align="left"><a href="index.php"><img src="assets/img/logo.png" alt=""></a></div>
</nav>
    <div class="container-fluid">
        <div align="center"><h3 align="center">Applicant Database</h3></div>
    </div>

<div class="container">
    <div class="row">
    <form class="form-floating" action="applicant_list.php" method="post">
        <div class="form-group">
            <label class="col-lg-sm-md-2 ui-controlgroup-label">Session</label>
            <div class="col-lg-sm-md-6">
            <select name="session" class="form-control" >
                <option name="session" value="NULL">Select...</option>
                <option name="session" value="SUMMER">SUMMER</option>
                <option name="session" value="SPRING">SPRING</option>
                <option name="session" value="FALL">FALL</option>
            </select></div>
        </div>
        <div class="form-group">
            <label class="col-lg-sm-md-2 ui-controlgroup-label">Year</label>
            <div class="col-lg-sm-md-6">
            <select name="year" class="form-control">
                <option name="year" value="NULL">Select...</option>
                <option name="year" value="2022">2022</option>
                <option name="year" value="2023">2023</option>
            </select></div>
        </div>
        <div class="form-group">
            <label class="col-lg-sm-md-2 ui-controlgroup-label">Select Department</label>
            <div class="col-lg-sm-md-6">
            <select name="department" id="department" class="form-control">
                <option name="department" value="NULL">Select...</option>
                <option name="department" value="CSE">Dept. Computer Science & Engineering</option>
                <option name="department" value="ARCH">Dept. of Architecture</option>
                <option name="department" value="BA">Dept. of Business Administration</option>
                <option name="department" value="ENGLISH">Dept. of English</option>
                <option name="department" value="FET">Dept. of Food Engineering & Technology</option>
                <option name="department" value="LAW">Dept. of Law Studies</option>
                <option name="department" value="PHAM">Dept. of Pharmacy</option>
                <option name="department" value="JCMS">Dept. of Journalism, Communication and Media Studies (JCMS)</option>
            </select></div>
        </div>
        <div class="form-group">
            <label class="col-lg-sm-md-2 ui-controlgroup-label">Program</label>
            <div class="col-lg-sm-md-6">
            <select name="program" id="program_cse" class="form-control">
                <option name="program" value="NULL">Select...</option>
                <option name="program" value="UG">Undergraduate</option>
                <option name="program" value="PG">Postgraduate</option>
            </select></div>
        </div>
        <div class="form-group">
        <div class="col-lg-sm-md-4">
            <input class="btn btn-primary" type="submit" name="submit">
        </div></div>
    </form>
</div>
</div>

<div class="row">
    <div class="col-lg-sm-md-6">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th>User ID</th>
            <th>Department</th>
            <th>Program</th>
            <th>Semester</th>
            <th>Year</th>
            <th>Payment Status</th>
            <th>Exam Status</th>
        </tr>
        </thead>
        <tbody>
        <?php include "database.php";
        if (isset($_POST['submit'])) {
            $session = $_POST['session'];
            $department = $_POST['department'];
            $program = $_POST['program'];
            $year = $_POST['year'];

            if ($session != "" || $department != "" || $program != "" || $year != "") {
                $query = "SELECT * FROM 03_applicant WHERE applicant_session='$session' AND applicant_year='$year' AND applicant_department='$department' AND applicant_program='$program'";
                $data = mysqli_query($link, $query) or die('error');
                if (mysqli_num_rows($data) > 0) {
                    while ($row = mysqli_fetch_assoc($data)) {
                        $name = $row['applicant_name'];
                        $userid = $row['applicant_user_name'];
                        $department = $row['applicant_department'];
                        $program = $row['applicant_program'];
                        $semester = $row['applicant_session'];
                        $year = $row['applicant_year'];
                        $status = $row['status_03'];
                        $exam = $row['applicant_exam'];

                        ?>
                        <tr>
                            <td><?= $name ?></td>
                            <td><?= $userid ?></td>
                            <td><?= $department ?></td>
                            <td><?= $program ?></td>
                            <td><?= $semester ?></td>
                            <td><?= $year ?></td>
                            <td>
                                <?php
                                if ($status == "1") {
                                    echo "Verified";
                                } else {
                                    echo "Pending";
                                }
                                ?></td>
                            <td><?php
                                if ($exam == "1") {
                                    echo "Pending";
                                } else {
                                    echo "Attended";
                                }
                                ?></td>
                            <td><a href="delete.php?id=<?=$row['applicant_id']?>" onclick="return confirm('Are you sure to delete this user?')" class="btn btn-danger btn-sm">Delete</a></td>
                            <td><a href="edit.php?id=<?=$row['applicant_id']?>" class="btn btn-outline-primary btn-sm">Edit</a></td>
                        </tr>
                        <?php
                    }
                } else { ?>
                    <tr>
                        <td>Data not found!</td>
                    </tr>
                    <?php
                }
            }
        }

        ?>
        </tbody>
    </table>
</div>
</div>

</body>
</html>