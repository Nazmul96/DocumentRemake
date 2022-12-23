<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid"> 
               Copyright &copy;  <script>
                    document.write(new Date().getFullYear())
                </script> bikroy by <a href="">therssoftware</a> 
    </div>
</footer>
<!-- end Footer -->

</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>


<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>



<!-- App js-->
<script src="{{ asset('assets/js/app.min.js') }}"></script>



<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            fixedHeader: true
        } );
    } );
    var table = $('#datatable').DataTable( {
        } );
</script>

</body>

</html>