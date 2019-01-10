
</div>
</div>
<!-- Javascripts-->
<script src="view/theme/dist/js/jquery-2.1.4.min.js"></script>
<script src="view/theme/dist/js/bootstrap.min.js"></script>
<script src="view/theme/dist/js/plugins/pace.min.js"></script>
<script src="view/theme/dist/js/main.js"></script>


<script src="view/theme/dist/js/jquery-2.1.4.min.js"></script>
<script src="view/theme/dist/js/plugins/pace.min.js"></script>
<script type="text/javascript" src="view/theme/dist/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="view/theme/dist/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript" src="view/theme/dist/js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="view/theme/dist/js/plugins/select2.min.js"></script>
<script type="text/javascript" src="view/theme/dist/js/plugins/bootstrap-datepicker.min.js"></script>
<!-- Javascripts-->

<script type="text/javascript">
    $('#sl').click(function () {
        $('#tl').loadingBtn();
        $('#tb').loadingBtn({text: "Signing In"});
    });

    $('#el').click(function () {
        $('#tl').loadingBtnComplete();
        $('#tb').loadingBtnComplete({html: "Sign In"});
    });

    $('#demoDate').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true
    });
    $('#demoDate1').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true
    });
    $('#dd_date').datepicker({
        format: "dd-mm-yyyy",
        autoclose: true,
        todayHighlight: true
    });

    $('#demoSelect').select2();
    $('#demoSelect1').select2();
</script>
<script type="text/javascript">$('body').removeClass("sidebar-mini").addClass("sidebar-collapse");</script>
</body>
</html>