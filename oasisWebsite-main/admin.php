<?php
//Original Author: Brianna Baldwin
//Date Created: 09/10/2021
//Version: 0.0
//Date Last Modified: 09/22/2021
//Modified by: Brianna Baldwin
//Modification log:
//   09/10/2021 - created admin.php | added php to collect and post messages for each assigned volunteer | added option to delete messages
//   09/17/2021 - linked model database.php and volunteer.php files | deleted database link | add volunteer and visit functions | added nav links
//   09/22/2021 - Added authentication and secure connection
require_once ('./model/database.php');
require_once ('./util/secure_conn.php');
require_once ('./util/valid_admin.php');
require_once ('./model/volunteer.php');
require_once ('./model/submission.php');
//require_once ('./model/logout.php');

//Check action; on initial load it is null
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_submissions';
    }
}

if ($action == 'list_submissions') {


//See if volunteer is set
    $volunteer_id = filter_input(INPUT_GET, 'volunteer_id', FILTER_VALIDATE_INT);
    if ($volunteer_id == NULL || $volunteer_id == FALSE) {
        $volunteer_id = 1;
    }

    try {
        $volunteers = VolunteerDB::getVolunteerList();
        $submissions = getSubmissionByEmp($volunteer_id);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
} else if ($action == 'delete_submission') {
    delSubmission($submission_id);
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Page</title>
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
<!--                    <li class="item"><a href="admin.php?action=logout">Logout</a></li>-->
                </div>  
            </ul>
        </nav>
    </header>
    <body>
        <main>
            <div id="" class="">
                <h1>Admin</h1> 
                <h3>Select a volunteer to view messages</h3>
                <aside>
                    <ul style="list-style-type:none; ">
                        <?php foreach ($volunteers as $volunteer) : ?>
                            <li>
                                <a href="?volunteer_id=<?php echo $volunteer['volunteer_id']; ?>">
                                    <?php echo $volunteer['first_name'] . ' ' . $volunteer['last_name']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </aside>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Contact By</th>
                        <th>Comments</th>
                        <th></th>
                    </tr>
                    <?php foreach ($submissions as $submission) : ?>
                        <tr>
                            <td><?php echo $submission['submission_date']; ?></td>
                            <td><?php echo $submission['email']; ?></td>
                            <td><?php echo $submission['phone']; ?></td>
                            <td><?php echo $submission['contact_by']; ?></td>
                            <td><?php echo $submission['comments']; ?></td>
                            <td>
                                <form action="admin.php" method="post">
                                    <input type="hidden" name="action" value="delete_submission" />
                                    <input type="hidden" name="submission_id" 
                                           value="<?php echo $submission['submission_id']; ?>" />
                                    <input type="submit" value="Delete" class="button"/>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </main>
    </body>
    <footer>
        <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a><br>
            <p>Inspiration from <a href="https://us.wateraid.org/campaign/emergency-global-hygiene-fund/c277193?c_src=ig-dig-20b-cvd&c_src2=bra-7&gclid=Cj0KCQiAjKqABhDLARIsABbJrGl53kVQKVAFT1Pg7v0M06_lnRx8zaOuMVF8BXxjtwbCUdUS9H8XtvwaAt1cEALw_wcB"> WaterAid.com</a></p>
            <p>&copy; Copyright 2021. All Rights Reserved.</p>
        </div>
    </footer>
</html>