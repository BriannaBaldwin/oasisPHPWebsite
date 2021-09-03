"use strict";
/***
Original Author: Brianna Baldwin
Date Created: 01/27/2021
Version: 0.0
Date Last Modified: 02/17/2021
Modified by: Brianna Baldwin
Modification log:
    01/27/2021 - Created script.js | Threw into onto page for FAQ, Contact, and Newsletter divs (will be edited in morning)
    01/29/2021 - Finished out contact/newsletter button js | edited hamb. menu js | deleted focus() for first tag in faqs
    02/02/2021 - Edited hambFunction to sliceUp/Down | edited faq functions to create accordian effect
    02/03/2021 - Got rid of carousel and added slideshow instead
    02/05/2021 - added jQuery UI function for FAQ accordion
    02/17/2021 - Moved hambFunction() to hambMenu.js
    ***/


/* Toggle between showing and hiding the navigation menu
links when the user clicks on the hamburger menu or links */

/***** FAQs Functions ******/
$(document).ready( () =>
            $("#accordion").accordion({
                event: "click",
                heightStyle: "content",
                collapsible: true,
                active: false,
                animate: 1000
            })
        )

/***** Slideshow Functions ******/

$(document).ready( () => {
    let nextSlide = $("#slides img:first-child");

    // start slide show
    setInterval( () => {
        $("#caption").fadeOut(1500);
        $("#slide").fadeOut(1500,
            () => {
                if (nextSlide.next().length == 0) {
                    nextSlide = $("#slides img:first-child");
                }
                else {
                    nextSlide = nextSlide.next();
                }
                const nextSlideSource = nextSlide.attr("src");
                const nextCaption = nextSlide.attr("alt");
                $("#slide").attr("src", nextSlideSource).fadeIn(1500);
                $("#caption").text(nextCaption).fadeIn(1500);
            });    // end fadeOut()
    },
    6000);         // end setInterval()
});
