<?php session_start();

if(empty($_SESSION['isLogged'])){

    header("location:applicant_login.php");
}
$id=$_GET['id'];
include 'database.php';
$result = "SELECT * FROM 03_applicant where applicant_id ='$id'";
$r1 = mysqli_query($link,$result);
while($row = mysqli_fetch_array($r1))
{
?>

<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js//bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="assets/css/admform.css">


    <script type="text/javascript">
        function printpage()
        {
            var printButton = document.getElementById("print");
            printButton.style.visibility = 'hidden';
            window.print()
            printButton.style.visibility = 'visible';
        }
    </script>
</head>

<body>
<form id="admitcard" action="admitcard.php" method="post">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div align="center">  <table class="table table-bordered">

                        <tr>
                            <td style="width:3%;"><img src="./assets/img/logo.png" width="50%"> </td>
                            <td style="width:8%;"><div align="center">
                                        STATE UNIVERSITY OF BANGLADESH, DHAKA</div>

                                <div align="center">
                                        77,SHATMASHJID ROAD, DHAKA-1207
                                    </div>

                                <br>
                                <br>
                                <div align="center">
                                       ADMIT CARD (2023-24)</font></div>
                            </td>
                            <td colspan="2" width="3%" >
                                <img src="./uploads/<?=$row['applicant_file']?>" class='img-rounded' height="180px">
                            </td>
                        </tr>


                        <tr>
                            <td style="width:4%;">Exam Date</td>
                            <td style="width:4%;">10th May 2016, Afternoon Session</td>
                        </tr>

                        <tr>
                            <td style="width:4%;">Time</td>
                            <td style="width:8%;" colspan="3"> 2:00 PM - 4:00 PM</td>
                        </tr>
                        <tr>
                            <td>Registration ID</td>
                            <td colspan="3"><?=$row['applicant_user_name'];?> </td>
                        </tr>

                        <tr>
                            <td style="width:4%;"> Name</td>
                            <td style="width:8%;" colspan="3"><?= $row ['applicant_name'];?> </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td colspan="3"><?=$row['applicant_phone'];?> </td>
                        </tr>

                        <tr>
                            <td style="width:4%;"> Exam Center </td>
                            <td style="width:8%;" colspan="3">
                                STATE UNIVERSITY OF BANGLADESH<br>
                                77, SHATMASHJID ROAD<br>
                                DHANMONDI<br>
                                DHAKA, BANGLADESH.
                            </td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>
        <?php }?>

    <div align="center">Instructions to the Candidate</div><br>

        <p style="margin-left: 100px; margin-right: 100px;">
            1. This Admit Card must be presented for verification at the time of examination, along with at least one
            original(not photocopied or scanned copy) and valid (not expired) photo identification card
            (e.g : Aadhaar Card, Voter ID).
        </p>

        <p style="margin-left: 100px; margin-right: 100px;">
            2. This Admit Card is valid only if the candidate's photograph and signature images are <b> legibly printed</b>.
            Print this on an A4 sized paper using a laser printer preferably a color photo printer.
        </p>

        <p style="margin-left: 100px; margin-right: 100px;">
            3. Candidates should occupy their alloted seats <b>25 minutes before</b> the scheduled start of the examination.
        </p>

        <p style="margin-left: 100px; margin-right: 100px;">
            4. Candidates will not be allowed to enter the examination hall <b>30 minutes</b>
            after the commencement of the examination.
        </p>

        <p style="margin-left: 100px; margin-right: 100px;">
            5. Mobile phones or any other Electronic gadgets are NOT ALLOWED inside the examination hall. There may not be any
            facility for the safe-keeping of your gadget outside the hall, so it may be easier to leave it at your residence.
        </p>

    <div align="center"><input type="button" id="print" class="toggle btn btn-primary" value="Print" onclick="printpage();"></div>
</form>
</body>
</html>

