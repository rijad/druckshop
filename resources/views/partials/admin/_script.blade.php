<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/admin/functions.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/admin/chart-area-demo.js') }}"></script>
<script src="{{ asset('public/js/admin/chart-bar-demo.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/admin/datatables-demo.js') }}"></script>

<script type="text/javascript">
        $(document).ready(function() {


            $(".add-more").click(function() {
                var html = $(".copy").html();
                console.log(html);
                $(".after-add-more").after(html);
            });


            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });


        });
    </script>