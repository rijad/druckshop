<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/admin/functions.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/admin/chart-area-demo.js') }}"></script>
<script src="{{ asset('public/js/admin/chart-bar-demo.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/js/admin/datatables-demo.js') }}"></script>
<script src="{{ asset('public/js/admin/custom.js') }}"></script>

<!-- plugins -->
<!-- summernote -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet" crossorigin="anonymous" />
<script src="{{ asset('public/js/plugins/summernote/summernote.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // summernote
        $('.summernote').summernote({

            height: 150,
        });

        //Add: add more for delivery services
        $('#delivery_add_more').click(function(){

            $( "#delivery_add_more" ).prop( "disabled", true );

            var from = 0;
            get_to_value = $('#dilivery_services_table tr:last td:nth(1) input').val();

            $('#dilivery_services_table tr:last td:nth(1) input').attr('type', 'hidden');
            $('#dilivery_services_table tr:last td:nth(1)').append(get_to_value);

            if (get_to_value) {

                from = ++get_to_value;
            }else{ 
               from = 0;
           }


           $('#dilivery_services_table').append('<tr class="form-inline"><td><input id="from" type="hidden" name="from[]" value='+from+' />'+from+'</td><td><input class="form-control to_input" id="to" type="number" name="to[]" required /></td><td><input class="form-control price_input" id="price" type="number" name="price[]" required /></td></tr>');
       });

        $('#delivery_remove_last').click(function(){
            var row_index = $('#dilivery_services_table tr:last').index(); 
            if(row_index >= 2){

                $('#dilivery_services_table tr:last').remove();
                $('#dilivery_services_table tr:last td:nth(1) input').val("");
                $('#dilivery_services_table tr:last td:nth(2) input').val("");


                $('#dilivery_services_table tr:last td:nth(1)').html("");
                $("#dilivery_services_table tr:last td:nth(1)").append('<input class="form-control to_input" id="to" type="number" name="to[]" required />');

            }
        });

        $(document).on('keyup', '.to_input', function() {

            var from_input = $('#dilivery_services_table tr:last td:nth(0) input').val();
            var to_input = $('#dilivery_services_table tr:last td:nth(1) input').val();

            var price_input = $('#dilivery_services_table tr:last td:nth(2) input').val();

            if (Number(to_input) > Number(from_input) && Number(price_input)) {

                $( "#delivery_add_more" ).prop( "disabled", false );
            }else{

                $( "#delivery_add_more" ).prop( "disabled", true );
            }


        });

        $(document).on('keyup', '.price_input', function() {

            var from_input = $('#dilivery_services_table tr:last td:nth(0) input').val();
            var to_input = $('#dilivery_services_table tr:last td:nth(1) input').val();

            var price_input = $('#dilivery_services_table tr:last td:nth(2) input').val();

            if (Number(to_input) > Number(from_input) && Number(price_input)) {

                $( "#delivery_add_more" ).prop( "disabled", false );
            }else{

                $( "#delivery_add_more" ).prop( "disabled", true );
            }
        });

        //end delivery services

        //Edit: add, more for delivery services
        $('#delivery_edit_add_new_row').click(function(){

         $( "#delivery_edit_add_new_row" ).prop( "disabled", true );

         var from = 0;

         
         get_to_value = $('#dilivery_services_table_edit tr:last td:nth(1) input').val();


         var for_spine = '<input class="form-control to_input" id="to" type="hidden" name="to[]" value='+get_to_value+'>'+get_to_value+'';

         $('#dilivery_services_table_edit tr:last td:nth(1)').html("");
         $('#dilivery_services_table_edit tr:last td:nth(1)').html(for_spine);

         if (get_to_value) {

            from = ++get_to_value;
        }else{ 
           from = 0;
       }

       $('#dilivery_services_table_edit').append('<tr class="form-inline"><td><input id="from" type="hidden" name="from[]" value='+from+' />'+from+'</td><td><input class="form-control to_input" id="to" type="number" name="to[]" required /></td><td><input class="form-control price_input" id="price" type="number" name="price[]" required /></td></tr>');
   });

        $('#delivery_edit_remove_last').click(function(){

            $( "#delivery_edit_add_new_row" ).prop( "disabled", true );
            var row_index = $('#dilivery_services_table_edit tr:last').index(); 

            if(row_index >= 2){


                var last_row_id = $('#dilivery_services_table_edit tr:last input').val();
                
                if (last_row_id) {

                    var base_ur = '<?php echo URL::to('/'); ?>';
                    $.ajax({
                        url: base_ur+'/admin/deliverySpine', 
                        type: 'GET', 
                        data: {'id': last_row_id},
                        async: false,
                        success: function (response){
                            console.log(response);
                        }

                    }); 

                    $('#dilivery_services_table_edit tr:last').remove();
                    $('#dilivery_services_table_edit tr:last td:nth(1) input').val("");
                    $('#dilivery_services_table_edit tr:last td:nth(2) input').val("");


                    $('#dilivery_services_table_edit tr:last td:nth(1)').html("");
                    $("#dilivery_services_table_edit tr:last td:nth(1)").append('<input class="form-control to_input" id="to" type="number" name="to[]" required />');
                } 
            }
        });


        $(document).on('keyup', '.to_input', function() {

            var from_input = $('#dilivery_services_table_edit tr:last td:nth(0) input').val();
            var to_input = $('#dilivery_services_table_edit tr:last td:nth(1) input').val();

            var price_input = $('#dilivery_services_table_edit tr:last td:nth(2) input').val();

            if (Number(to_input) > Number(from_input) && Number(price_input) ) {

                $( "#delivery_edit_add_new_row" ).prop( "disabled", false );
            }else{

                $( "#delivery_edit_add_new_row" ).prop( "disabled", true );
            }


        });

        $(document).on('keyup', '.price_input', function() {

            var from_input = $('#dilivery_services_table_edit tr:last td:nth(0) input').val();
            var to_input = $('#dilivery_services_table_edit tr:last td:nth(1) input').val();

            var price_input = $('#dilivery_services_table_edit tr:last td:nth(2) input').val();

            if (Number(to_input) > Number(from_input) && Number(price_input)) {

                $( "#delivery_edit_add_new_row" ).prop( "disabled", false );
            }else{

                $( "#delivery_edit_add_new_row" ).prop( "disabled", true );
            }
        });

        //end delivery services


        //Add: add more for paper weight
        $('#paper_weight_add_more').click(function(){

            $( "#paper_weight_add_more" ).prop( "disabled", true );

            var from = 0;
            get_to_value = $('#paper_weight_table tr:last td:nth(1) input').val();

            $('#paper_weight_table tr:last td:nth(1) input').attr('type', 'hidden');
            $('#paper_weight_table tr:last td:nth(1)').append(get_to_value);

            if (get_to_value) {

                from = ++get_to_value;
            }else{ 
               from = 0;
           }



           $('#paper_weight_table').append('<tr class="form-inline"><td><input id="from" type="hidden" name="sheet_start[]" value='+from+' />'+from+'</td><td><input type="number" class="form-control sheet_end_input" id="from" name="sheet_end[]"  placeholder="sheet range" /></td><td><input class="form-control latters_input" id="latters" type="number" name="latters[]" required /></td></tr>');
       });

        $('#paper_remove_last').click(function(){
            var row_index = $('#paper_weight_table tr:last').index(); 
            if(row_index >= 2){

                $('#paper_weight_table tr:last').remove();
                $('#paper_weight_table tr:last td:nth(1) input').val("");
                $('#paper_weight_table tr:last td:nth(2) input').val("");


                $('#paper_weight_table tr:last td:nth(1)').html("");
                $("#paper_weight_table tr:last td:nth(1)").append('<input type="number" class="form-control sheet_end_input" id="from" name="sheet_end[]"  placeholder="sheet range" />');

            }
        });

        $(document).on('keyup', '.min_sheets_for_spine', function() {

            var min_sheets_for_spine = 0;
            min_sheets_for_spine = $('#min_sheets_for_spine').val();

            if (Number(min_sheets_for_spine) < 1) {

                min_sheets_for_spine = 0;
            }


            var for_spine = '<input class="first_row" id="from" type="hidden" name="sheet_start[]" value='+min_sheets_for_spine+' />'+min_sheets_for_spine+'';
            // $('#paper_weight_table tr:not(:last-child) td:nth(0) input').val(min_sheets_for_spine);
            $('#paper_weight_table tr td:nth(0)').html(for_spine);
            $('#paper_weight_edit_table tr td:nth(0)').html(for_spine);
            

        });

        $(document).on('keyup', '.sheet_end_input', function() {

            var sheet_start = $('#paper_weight_table tr:last td:nth(0) input').val();
            var sheet_end = $('#paper_weight_table tr:last td:nth(1) input').val();

            var latters_input = $('#paper_weight_table tr:last td:nth(2) input').val();

            if (Number(sheet_end) > Number(sheet_start) && Number(latters_input) > 0) {

                $( "#paper_weight_add_more" ).prop( "disabled", false );
            }else{

                $( "#paper_weight_add_more" ).prop( "disabled", true );
            }

        });

        $(document).on('keyup', '.latters_input', function() {

           var sheet_start = $('#paper_weight_table tr:last td:nth(0) input').val();
           var sheet_end = $('#paper_weight_table tr:last td:nth(1) input').val();

           var latters_input = $('#paper_weight_table tr:last td:nth(2) input').val();

           if (Number(sheet_end) > Number(sheet_start) && Number(latters_input) > 0) {

            $( "#paper_weight_add_more" ).prop( "disabled", false );
        }else{

            $( "#paper_weight_add_more" ).prop( "disabled", true );
        }

    });

        //end paper weight

         //Edit: add, more for paper weight
         $('#paper_weight_edit_add_new_row').click(function(){

            $( "#paper_weight_edit_add_new_row" ).prop( "disabled", true );

            var from = 0;
            get_to_value = $('#paper_weight_edit_table tr:last td:nth(1) input').val();

            $('#paper_weight_edit_table tr:last td:nth(1) input').attr('type', 'hidden');
            $('#paper_weight_edit_table tr:last td:nth(1)').append(get_to_value);

            if (get_to_value) {

                from = ++get_to_value;
            }else{ 
               from = 0;
           }

           $('#paper_weight_edit_table').append('<tr class="form-inline"><td><input id="from" type="hidden" name="sheet_start[]" value='+from+' />'+from+'</td><td><input type="number" class="form-control sheet_end_input" id="from" name="sheet_end[]"  placeholder="sheet range" /></td><td><input class="form-control latters_input" id="latters" type="number" name="latters[]" required /></td></tr>');
       });

         $('#paper_weight_edit_remove_last').click(function(){

            var row_index = $('#paper_weight_edit_table tr:last').index(); 
            if(row_index >= 2){

                var last_row_id = $('#paper_weight_edit_table tr:last input').val();
                
                if (last_row_id) {

                    var base_ur = '<?php echo URL::to('/'); ?>';
                    $.ajax({
                        url: base_ur+'/admin/deletePaperWeightSpin', 
                        type: 'GET', 
                        data: {'id': last_row_id},
                        async: false,
                        success: function (response){
                            console.log(response);
                        }

                    }); 

                    $('#paper_weight_edit_table tr:last').remove();

                    $('#paper_weight_edit_table tr:last td:nth(1) input').val("");
                    $('#paper_weight_edit_table tr:last td:nth(2) input').val("");


                    $('#paper_weight_edit_table tr:last td:nth(1)').html("");
                    $("#paper_weight_edit_table tr:last td:nth(1)").append('<input type="number" class="form-control sheet_end_input" id="from" name="sheet_end[]"  placeholder="sheet range" />');
                } 

            }
        });


         $(document).on('keyup', '.sheet_end_input', function() {

            var sheet_start = $('#paper_weight_edit_table tr:last td:nth(0) input').val();

            var sheet_end = $('#paper_weight_edit_table tr:last td:nth(1) input').val();

            var latters_input = $('#paper_weight_edit_table tr:last td:nth(2) input').val();


            if (Number(sheet_end) > Number(sheet_start) && Number(latters_input) > 0) {

                $( "#paper_weight_edit_add_new_row" ).prop( "disabled", false );
            }else{

                $( "#paper_weight_edit_add_new_row" ).prop( "disabled", true );
            }


        });

         $(document).on('keyup', '.latters_input', function() {

            var sheet_start = $('#paper_weight_edit_table tr:last td:nth(0) input').val();

            var sheet_end = $('#paper_weight_edit_table tr:last td:nth(1) input').val();

            var latters_input = $('#paper_weight_edit_table tr:last td:nth(2) input').val();

            if (Number(sheet_end) > Number(sheet_start) && Number(latters_input) > 0) {

                $( "#paper_weight_edit_add_new_row" ).prop( "disabled", false );
            }else{

                $( "#paper_weight_edit_add_new_row" ).prop( "disabled", true );
            }

        });

        //end paper weight



        // Binding Form Validation and js
        $(document).on('click', '#cover_setting', function() {

            var cover_setting = $('input:radio[name=cover_setting]:checked').val();

            if (cover_setting == 1) {

                $('.cover_color').show();
                $('.cover_sheet').hide();
                $('.back_cover').hide();
            } else if (cover_setting == 2) {

                $('.cover_color').show();
                $('.cover_sheet').show();
                $('.back_cover').show();
            }else{

                $('.cover_color').hide();
                $('.cover_sheet').hide();
                $('.back_cover').hide();
            }


        });


        $(document).on('click', '#print_finishing', function() {

            var print_finishing = $('input:radio[name=print_finishing]:checked').val();

            if (print_finishing == 2) {

                $('.art_list').show();
            } else {

                $('.art_list').hide();
            }

        });

        //cover_setting load
        var cover_setting = $('input:radio[name=cover_setting]:checked').val();

        if (cover_setting == 1) {

            $('.cover_color').show();
            $('.cover_sheet').hide();
            $('.back_cover').hide();
        } else if (cover_setting == 2) {

            $('.cover_color').show();
            $('.cover_sheet').show();
            $('.back_cover').show();
        }else{

            $('.cover_color').hide();
            $('.cover_sheet').hide();
            $('.back_cover').hide();
        }

        //print_finishing load
        var print_finishing = $('input:radio[name=print_finishing]:checked').val();

        if (print_finishing == 2) {

            $('.art_list').show();
        } else {

            $('.art_list').hide();
        }

         //Binding -> Add More -> Create form
         $('#binding_add_more').click(function(){

            $( "#binding_add_more" ).prop( "disabled", true );

            var start = 0;
            get_end_value = $('#binding_table tr:last td:nth(1) input').val();
            console.log('get_end_value', get_end_value);

            if (get_end_value) {

                start = get_end_value;
            }else{ 
               start = 0;
           }

           $('#binding_table').append('<tr class="form-inline"><td><input id="start" type="hidden" name="sheet_start[]" value='+start+' />'+start+'</td><td><input class="form-control end" id="end" type="number" name="sheet_end[]" placeholder="page range" required /></td><td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" placeholder="price" required /></td></tr>');
       });

         $('#binding_remove_last').click(function(){
            var row_index = $('#binding_table tr:last').index(); 
            if(row_index >= 2){

                $('#binding_table tr:last').remove();

                $('#binding_table tr:last td:nth(2) input').val("");

                $('#binding_table tr:last td:nth(1)').html("");
                $("#binding_table tr:last td:nth(1)").append('<input class="form-control end" id="end" type="number" name="sheet_end[]" placeholder="page range" />');


            }
        });

         $(document).on('keyup', '.end', function() {

            var end = $('#binding_table tr:last td:nth(1) input').val();

            var product_price = $('#binding_table tr:last td:nth(2) input').val();

            if (end > 0 && product_price > 0) {

                $( "#binding_add_more" ).prop( "disabled", false );
            }


        });

         $(document).on('keyup', '.product_price', function() {

            var end = $('#binding_table tr:last td:nth(1) input').val();

            var product_price = $('#binding_table tr:last td:nth(2) input').val();

            if (end > 0 && product_price > 0) {

                $( "#binding_add_more" ).prop( "disabled", false );
            }

        });





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