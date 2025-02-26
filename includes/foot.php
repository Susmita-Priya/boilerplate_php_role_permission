<!-- Dynamic content will be loaded here -->

</div>
</div> <!-- container -->
</div> <!-- content -->


<?php include("includes/footer.php"); ?>

</div>

<!-- jQuery  -->
<script src="resources/admin_dashboard/assets/js/jquery.min.js"></script>
<script src="resources/admin_dashboard/assets/js/popper.min.js"></script> <!-- Popper for Bootstrap -->
<script src="resources/admin_dashboard/assets/js/bootstrap.min.js"></script>
<script src="resources/admin_dashboard/assets/js/metisMenu.min.js"></script>
<script src="resources/admin_dashboard/assets/js/waves.js"></script>
<script src="resources/admin_dashboard/assets/js/jquery.slimscroll.js"></script>



<!-- Counter js  -->
<script src="resources/admin_dashboard/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="resources/admin_dashboard/plugins/counterup/jquery.counterup.min.js"></script>

<!--C3 Chart-->
<script type="text/javascript" src="admin_dashboard/plugins/d3/d3.min.js"></script>
<script type="text/javascript" src="admin_dashboard/plugins/c3/c3.min.js"></script>

<!--Echart Chart-->
<script src="resources/admin_dashboard/plugins/echart/echarts-all.js"></script>

<!-- Dashboard init -->
<script src="resources/admin_dashboard/assets/pages/jquery.dashboard.js"></script>

<script src="resources/admin_dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="resources/admin_dashboard/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="resources/admin_dashboard/plugins/datatables/dataTables.responsive.min.js"></script>

<!-- App js -->
<script src="resources/admin_dashboard/assets/js/jquery.core.js"></script>
<script src="resources/admin_dashboard/assets/js/jquery.app.js"></script>

<!-- @stack('js') -->

<!-- custom js -->
<!-- <script src="{{ asset('js/custom.js') }}"></script> -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>


<!-- select2  -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.form-control[multiple]').select2({
            allowClear: true
        });
    });
</script>

</body>

</html>