
$(document).ready(function () {
    $('#can_add_din_A2').click(function () {
        $('#max_a2').toggle();
    })

    $('#can_add_din_A3').click(function () {
        $('#max_a3').toggle();
    })

    $("#can_add_din_A2").click(function () {
        if ($(this).is(":checked")) {
            $("#max_a22").show();
        } else {
            $("#max_a22").hide();
        }
    });

    $("#can_add_din_A3").click(function () {
        if ($(this).is(":checked")) {
            $("#max_a33").show();
        } else {
            $("#max_a33").hide();
        }
    });

    if ($("#can_add_din_A2").is(":checked")) {

        $("#max_a22").show();
    } else {
        
        $("#max_a22").hide();
    }


    if($("#can_add_din_A3").is(":checked")){

        $("#max_a33").show();
    }else{

        $("#max_a33").hide();
    }

});

//Create Discount
    //for single product
        $(document).ready(function() {
            $("#one").click(function() {

                $("#single-pro").show();
                $("#many-pro").hide();
        });
    //for multiple product
        $("#multiple").click(function() {

            $("#many-pro").show();
            $("#single-pro").hide();
        });
    //for delivery product
        $("#product_delivery").click(function() {

            $("#many-pro").hide();
            $("#single-pro").hide();
        });
    });

//Edit Discount
    //for single product
        $(document).ready(function() {
            $("#one_edit").click(function() {

                $("#single").show();
                $("#many").hide();
        });
    //for multiple product
        $("#multiple_edit").click(function() {

            $("#many").show();
            $("#single").hide();
        });
    //for delivery product
        $("#product_delivery_edit").click(function() {

            $("#many").hide();
            $("#single").hide();
        });


        // if($('#multiple_edit').is(':checked')){
        //     $('#many').show();
        // }else{
        //     $('#many').hide();
        // }
});