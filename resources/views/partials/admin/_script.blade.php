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

        $("body").on("click", ".edit_remove", function() {
            $(this).parents(".edit_remove_for").remove();
        });


        var max_fields = 10;
        var wrapper = $(".main_input"); //Input fields wrapper
        var add_button = $(".add_new_row"); //Add button class or ID
        var x = 1; //Initial input field is set to 1

        $(add_button).click(function(e) {
            e.preventDefault();
            //Check maximum allowed input fields
            if (x < max_fields) {
                x++; //input field increment
                //add input field
                $(wrapper).append('<div class="after-add-more control-group"><div class="edit_remove_for control-group form-inline"><input id="from" type="hidden" name="id[]" /><div><input id="from" type="hidden" name="from[]"  />0</div><div><input class="form-control" id="to" type="number" name="to[]" /></div><div><input class="form-control" id="price" type="number" name="price[]" /></div><div><button type="button" class="form-control btn btn-danger btn-sm mr-2 edit_remove"> <span>Remove</span></button></div></div></div>');
            }
        });

        //for paper weight page
        var max_paper_fields = 10;
        var paper_wrapper = $(".paper_input"); 
        var add_paper_button = $(".add_paper_row"); 
        var i = 1; //Initial input field is set to 1

        $(add_paper_button).click(function(e) {
            e.preventDefault();
            //Check maximum allowed input fields
            if (i < max_paper_fields) {
                i++; //input field increment
                //add input field
                $(paper_wrapper).append('<div class="after-add-more form-inline"><div><input id="from" type="hidden" name="sheet_start[]" value="301" />301</div><div><input id="from" name="sheet_end[]" placeholder="sheet range" /></div><div><input class="form-control" id="latters" type="number" name="latters[]" placeholder="latter number" /></div><div><button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove</span></button></div></div>');
            }
        });

        $("body").on("click", ".remove_paper", function() {
            $(this).parents(".paper_div").remove();
        });


    });
</script>