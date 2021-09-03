/***
Original Author: Brianna Baldwin
Date Created: 02/17/2021
Version: 0.0
Date Last Modified: 02/17/2021
Modified by: Brianna Baldwin
Modification log: 
    02/17/2021 - Created js file for hambMenu | dolphin spin | pull-down menu
    ***/
"use strict";

function hambFunction() {
    const nav = document.getElementById("myLinks");
    const hambImg = document.getElementById("hambImg")
    
    $(nav).toggleClass("open");

    if ($(nav).attr("class") != "open") {
      $(nav).slideUp(1000);
    } else {
        $(nav).slideDown(1000);
    }

    $(hambImg).toggleClass("rotate");
    $(hambImg).toggleClass("rotateAgain");
  }