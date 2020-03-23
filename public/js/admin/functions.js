/*!
    * Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
    */
   (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);

// function dateCompare(from_date,to_date){
//     // alert('hello');
//     // die;
//     var d1 = new Date(from_date); 
//     var d2 = new Date(to_date); 
//     var date1 = document.getElementById("from_date").value;
//     var date2 = document.getElementById("to_date").value;
//     if(date1 != "" && date2 != ""){
//         alert('hey');
//         if (d2.getTime() - d1.getTime() >= 30){
//             alert('hey');
//         // document.write("ok"); 
//     }else{
//         document.write("not ok");
//     }
//     }
}
