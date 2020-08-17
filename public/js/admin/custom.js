
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
            $("#price").show();
        });
    //for delivery product
        $("#product_delivery").click(function() {

            $("#many-pro").hide();
            $("#single-pro").hide();
            $("#price").hide();
        });
    });

//Edit Discount
    //for single product
        // $(document).ready(function() {
        //     $("#one_edit").click(function() {

        //         $("#single").show();
        //         $("#many").hide();
        // });
    //for multiple product
            $(document).ready(function() {
                if ($("#multiple_edit").is(":checked")) {
                   // alert('hey'); 
                   $("#many").show();
                    $("#percent").show();
                } else {
                    // alert('bye');
                    $("#many").hide();
                    $("#percent").hide();
                }
    //for delivery product
            
                if ($("#product_delivery_edit").is(":checked")) {
                    $("#many").hide();
                    $("#percent").hide();
                } else {
                    $("#many").show();
                    $("#percent").show();
                }
                
            });

        $("#multiple_edit").click(function() {
                if ($(this).is(":checked")) {

                   $("#many").show();
                    $("#percent").show();

                } else {

                    $("#many").hide();
                    $("#percent").hide();
                }
                
            });
        $("#product_delivery_edit").click(function() {
                if ($(this).is(":checked")) {
                    $("#many").hide();
                    $("#percent").hide();
                } else {
                    $("#many").show();
                    $("#percent").show();
                }
                
            });