
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