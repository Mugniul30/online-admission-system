<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#"> A.A.Mugniul Haque</a></p>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="assets/js/jquery1-3.4.1.min.js"></script>

<script src="assets/js/popper1.min.js"></script>

<script src="assets/js/bootstrap1.min.js"></script>

<script src="assets/js/metisMenu.js"></script>

<script src="assets/vendors/scroll/perfect-scrollbar.min.js"></script>
<script src="assets/vendors/scroll/scrollable-custom.js"></script>

<script src="assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
       $("#department").on('change',function () {
           $(".info").hide();
           $("#" + $(this).val()).fadeIn(700);
       }).change();
    });

</script>
<script>
    $(document).ready(function () {
        $("#session").on('change',function () {
            $(".list").hide();
            $("#" + $(this).val()).fadeIn(700);
        }).change();
    });

</script>
</body>

</html>
