/***
Original Author: Brianna Baldwin
Date Created: 01/29/2021
Version: 0.0
Date Last Modified: 02/17/2021
Modified by: Brianna Baldwin
Modification log: 
    01/29/2021 - Created contact.js | added constants, validation, and submit/reset button functions 
    02/03/2021 - Edited form so it uses jQuery | Added errorMsg class
    02/10/2021 - Added regex for validity testing
    02/17/2021 - Moved hambFunction() to hambMenu.js
    ***/
//"use strict";
//
///* Toggle between showing and hiding the navigation menu 
//links when the user clicks on the hamburger menu or links */
//
//$(document).ready( () => {

//    //alert for contactEntered
//let contactEntered = "Thanks for your comments!\nWe'll contact you shortly";
//
//    // handle click on Join List button
//    $("#submit_form").click( evt => {
//        let isValid = true;
//
//        // validate email address
//        const emailPattern = 
//            /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;
//        const email = $("#email_address").val().trim();
//        if (email == "") { 
//            $("#email_address").next().addClass("errorMsg");
//            $("#email_address").next().text("This field is required.");
//            isValid = false;
//        } else if ( !emailPattern.test(email) ) {
//            $("#email_address").next().addClass("errorMsg");
//            $("#email_address").next().text("Must be a valid email address.");
//            isValid = false;
//        } else {
//            $("#email_address").next().text("");
//            $("#email_address").next().removeClass("errorMsg");
//        }
//        $("#email_address").val(email);
//
//        // validate phone number
//        const phonePattern = /^\d{3}\-\d{3}\-\d{4}$/;
//        const phoneNum = $("#phone").val().trim(); 
//        if (phoneNum == "") {
//            $("#phone").next().addClass("errorMsg");
//            $("#phone").next().text("This field is required.");
//            isValid = false;
//        } else if (!phonePattern.test(phoneNum)) {
//            $("#phone").next().addClass("errorMsg");
//            $("#phone").next().text("Please enter phone number in NNN-NNN-NNNN format.");
//        } else {
//            $("#phone").next().text("");
//            $("#phone").next().removeClass("errorMsg");
//        }
//        $("#phone").val(phoneNum);
//
//        // validate country
//        let country = [];
//            country = $(":input:selected");
//            const countryOption = $("#country_selected")
//            if ( countryOption.val() == "") {
//                $("#country_selected").next().addClass("errorMsg");
//                $("#country_selected").next().text("Select a country");
//                isValid = false;
//            } else {
//                $("#country_selected").next().text("");
//                $("#country_selected").next().removeClass("errorMsg");
//            }	
//        $("#country_selected").val(country);
//
//        // validate terms of service
//        let checkedBoxes = [];
//            checkedBoxes = $(":checkbox:checked");
//            if ( checkedBoxes.length == 0) {
//                $("#terms").next().addClass("errorMsg");
//                $("#terms").next().text("You must agree to the terms");
//                isValid = false;
//            } else {
//                $("#terms").next().text("");
//                $("#terms").next().removeClass("errorMsg");
//            }	
//
//         // validate comments
//         const commentsBox = $("#comments").val().trim(); 
//         if (commentsBox == "") {
//            $("#comments").next().addClass("errorMsg");
//             $("#comments").next().text("This field is required.");
//             isValid = false;
//         } else {
//             $("#comments").next().text("");
//             $("#comments").next().removeClass("errorMsg");
//         }
//         $("#comments").val(commentsBox);
//
//		// prevent the default action of submitting the form if any entries are invalid 
//		if (isValid == false) {
//            evt.preventDefault();
//		} else {
//            alert(contactEntered);
//        }
//    });

//    // handle click on Reset Form button
//    $("#reset_form").click( () => {
//        // clear text boxes
//        $("#email_address").val("");
//        $("#phone").val("");
//        $("#comments").val("");
//
//
//        // reset span elements
//        $("#email_address").next().text("*");
//        $("#phone").next().text("*");
//        $("#country_selected").next().text("*");
//        $("#terms").next().text("*");
//        $("#comments").next().text("*");
//
//        //remove errorMsg class
//        $("#email_address").next().removeClass("errorMsg");
//        $("#email_address").next().removeClass("errorMsg");
//        $("#phone").next().removeClass("errorMsg");
//        $("#country_selected").next().removeClass("errorMsg");
//        $("#terms").next().removeClass("errorMsg");
//        $("#comments").next().removeClass("errorMsg");
//
//        $("#email_address").focus();
//    });
//
//    // move focus to first text box
//    $("#email_address").focus();
//});

// if (email.value == "") {
//     msgs[msgs.length] = "Please enter an email address";
// }
// if (phone.value == "") {
//     msgs[msgs.length] = "Please enter a mobile phone number";
// }
// if (country.value == "") {
//     msgs[msgs.length] = "Please select a country";
// }
// if (terms.checked == false) {
//     msgs[msgs.length] = "You must agree to the terms of service";
// }
// if (comments.value == "") {
//     msgs[msgs.length] = "Please enter a comment";