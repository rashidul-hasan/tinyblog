(function ($) {
	"use strict";

    jQuery(document).ready(function($){



        //Hamburger Menu
        $(".menu-triger").on("click", function() {
            $(".offcanvas-menu , .offcanvas-overlay").addClass("active");
            return false;
        });

        $(".menu-close , .offcanvas-overlay").on("click", function() {
            $(".offcanvas-menu ,.offcanvas-overlay").removeClass("active");
        });


    });




}(jQuery));	