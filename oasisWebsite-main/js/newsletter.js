/***
Original Author: Brianna Baldwin
Date Created: 01/29/2021
Version: 0.0
Date Last Modified: 02/17/2021
Modified by: Brianna Baldwin
Modification log: 
    01/29/2021 - Created newsletter.js | added constants, validation, and submit/reset button functions
    02/03/2021 - Edited form so it uses jQuery | Added errorMsg class
    02/10/2021 - Added regex for validity testing
    02/17/2021 - Moved hambFunction() to hambMenu.js
    ***/
"use strict";


/* Toggle between showing and hiding the navigation menu 
links when the user clicks on the hamburger menu or links */

$(document).ready( () => {
    const displayErrorMsgs = msgs => {
        //create new ul element
        const ul = document.createElement("ul");
        ul.classList.add("messages");
    
        //create new li element for each error msg, add to ul
        for (let msg of msgs) {
            const li = document.createElement("li");
            const text = document.createTextNode(msg);
            li.appendChild(text);
            ul.appendChild(li);
        }
    }
 let signedUp = "Thank you for signing up for our newsletter!"; // success alert
 const msgs = [];
    // handle click on Join List button
    $("#join_list").click( evt => {
        let isValid = true;

        // validate the first email address
        const emailPattern = 
            /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;
        const email1 = $("#email_1").val().trim();
        if (email1 == "") { 
            msgs[msgs.length] = "\nEmail is required";
            isValid = false;
        } else if ( !emailPattern.test(email1) ) {
            msgs[msgs.length] = "\nMust be a valid email address";
            isValid = false;
        } else {
            isValid == true;
        }
        $("#email_1").val(email1);

        // validate the second email address
        const email2 = $("#email_2").val().trim();
        if (email2 == "") { 
            msgs[msgs.length] = "\nEmail confirmation is required";
            isValid = false; 
        } else if (email1 != email2) { 
            msgs[msgs.length] = "\nThe email addresses must match";
            isValid = false;
        } else {
            isValid == true;
        }
        $("#email_2").val(email2);
        
        // validate the full name entry 
        const namePattern = /^[A-Za-z]+\s[A-Za-z]+$/;
        const fullName = $("#full_name").val().trim(); 
        if (fullName == "") {
            msgs[msgs.length] = "\nPlease enter a name";
            isValid = false;
        } else if (!namePattern.test(fullName)) {
            msgs[msgs.length] = "\nPlease enter your first and last name";
            isValid = false;
        } else {
            isValid == true;
        }
        $("#full_name").val(fullName);

        let errorMsg = (msgs);
		// prevent the default action of submitting the form if any entries are invalid 
		if (isValid == false) {
            evt.preventDefault();
            alert(errorMsg);
            msgs.splice(0,msgs.length);
		} else {
            alert(signedUp);
            $("#email_1").val("");
            $("#email_2").val("");
            $("#full_name").val("");
            
        }
    });
    
    // move focus to first text box
    $("#email_1").focus();
});
