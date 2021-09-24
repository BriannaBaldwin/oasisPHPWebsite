<?php
//Original Author: Brianna Baldwin
//Date Created: 09/10/2021
//Version: 0.0
//Date Last Modified: 09/17/2021
//Modified by: Brianna Baldwin
//Modification log:
//   09/03/2021 - created error.php
//   09/17/2021 - added nav links
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Error Page</title>
        <!-- Styles -->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/contact.css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon_io/favicon.ico">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
        <link rel="icon" sizes="192x192" href="img/favicon_io/android-chrome-192x192.png">
        <!-- JS Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <script src="js/hambMenu.js"></script> <!-- JS for HambMenu -->
    </head>
    <header>
            <!-- <img src="img/drop.png" alt="Oasis Droplet Logo" height="30px" width="30px"> -->
        <!-- Navbar -->
        <nav>
            <a name="top"></a>
            <ul class="topnav" id="myTopnav">
                <div>
                    <li><a href="home.html" class="active">Oasis</a></li>
                    <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
                    <li><a href="javascript:void(0);" id="hambNav" class="hambNav" onclick="hambFunction()">
                            <span><i class="fa fa-bars"><img id="hambImg" class="rotate" src="img/logo2.png"/></i></span>
                        </a></li>
                </div>
                <!-- Navigation links (hidden by default) -->
                <div id="myLinks" class="">
                    <li class="item"><a href="home.html">Slideshow</a></li>
                    <li class="item"><a href="home.html">Newsletter</a></li>
                    <li class="item"><a href="home.html">FAQs</a></li>
                    <li class="item"><a href="contact.html">Contact</a></li>
                    <li class="item"><a href="admin.php">Admin</a></li>
                    <li class="item"><a href="list_volunteers.php">ListVol</a></li>
                </div>  
            </ul>
        </nav>
    </header>
    <body>
        <main><!-- Newsletter: 06.03, email_list -->
            <div id="contact" class="contact">
                <main>
                    <h2 class="top">Error</h2>
                    <p><?php echo $error; ?></p>
                </main>
            </div>
    </body>
    <footer>
        <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a><br>
            <p>Inspiration from <a href="https://us.wateraid.org/campaign/emergency-global-hygiene-fund/c277193?c_src=ig-dig-20b-cvd&c_src2=bra-7&gclid=Cj0KCQiAjKqABhDLARIsABbJrGl53kVQKVAFT1Pg7v0M06_lnRx8zaOuMVF8BXxjtwbCUdUS9H8XtvwaAt1cEALw_wcB"> WaterAid.com</a></p>
            <p>&copy; Copyright 2021. All Rights Reserved.</p>
        </div>
    </footer>
</html>