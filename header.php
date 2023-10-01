<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script type="text/javascript" src="assets/js/fetchndisp.js"></script>
    <script type="text/javascript" src="assets/js/fetchndisplaylaw.js"></script>
    <script type="text/javascript" src="assets/js/fetchndisplayFET.js"></script>
    <script type="text/javascript" src="assets/js/fetchndisplayBBA.js"></script>
    <script type="text/javascript" src="assets/js/fetchndisplayBPHAM.js"></script>
    <script type="text/javascript" src="assets/js/fetchndisplayBARCH.js"></script>
    <script type="text/javascript" src="assets/js/fetchndisplayJCMS.js"></script>
    <script type="text/javascript" src="assets/js/fetchndisplayENGLISH.js"></script>
    <script type="text/javascript" src="assets/js/showhideinfo.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        $(document).ready(function () {

            var html = '<tr><td><select name="degree[]" id="degree"><option value="null">choose your degree...</option><option value="SSC">SSC / Equivalent</option><option value="HSC">HSC / Equivalent</option><option value="HONS">BACHELOR / Equivalent</option><option value="MASTERS">MASTERS</option><option value="other">other</option></select></td><td><input type="text" name="institute[]" class="form-control" placeholder="Institute"></td><td><input type="text" name="group[]" class="form-control" placeholder="Group"></td><td><input type="text" name="board[]" class="form-control" placeholder="Board"></td><td><input type="text" name="sscgrade[]" class="form-control" placeholder="Grade (Out of 5.00)"></td><td><input class="btn btn-danger" type="button" name="remove" value="remove" id="remove"></td></tr>';

            var x = 1;
            var max =3;

            $("#add").click(function () {
                if (x<=max){
                    x++;
                    $("#table-field").append(html);

                }

            })
            $("#table-field").on('click','#remove',function () {
                $(this).closest('tr').remove();
                x--;
            })


        })
    </script>
    <title>Online Admission System</title>
    <style>
        .form-group span{
            color: red;
        }

        .info {
            display: none;
        }
        .list {
            display: none;
        }
    </style>
    <link rel="icon" href="assets/img/logo.png" type="image/png">

    <link rel="stylesheet" href="assets/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="assets/vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="assets/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="assets/vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="assets/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="assets/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="assets/vendors/datepicker/date-picker.css" />

    <link rel="stylesheet" href="assets/vendors/scroll/scrollable.css" />

    <link rel="stylesheet" href="assets/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="assets/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="assets/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="assets/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="assets/vendors/morris/morris.css">

    <link rel="stylesheet" href="assets/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="assets/css/metisMenu.css">

    <link rel="stylesheet" href="assets/css/style1.css" />
    <link rel="stylesheet" href="assets/css/colors/default.css" id="colorSkinCSS">

</head>