<?php
//Original Author: Brianna Baldwin
//Date Created: 09/10/2021
//Version: 0.0
//Date Last Modified: 09/10/2021
//Modified by: Brianna Baldwin
//Modification log:
//   09/10/2021 - created admin.php | added php to collect and post messages for each assigned volunteer | added option to delete messages
// Validate inputs
$dsn = 'mysql:host=localhost;dbname=oasis'; //my db name
$username = 'oasis_user';   //'my db username';
$password = 'Pa$$w0rd';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}

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
//Get visit info for volunteer
        $queryVolunteer = 'SELECT * FROM volunteer';
        $statement1 = $db->prepare($queryVolunteer);
        $statement1->execute();
        $volunteers = $statement1;

        $query2 = 'SELECT submission_id, submission_date, form_submission.email, comments, phone, contact_by, form_submission.volunteer_id
                FROM form_submission
                JOIN volunteer on form_submission.volunteer_id = volunteer.volunteer_id
                WHERE volunteer.volunteer_id = :volunteer_id
                ORDER BY submission_date';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(":volunteer_id", $volunteer_id);
        $statement2->execute();
        $submissions = $statement2;
        // $statement2->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
} else if ($action == 'delete_submission') {
    $submission_id = filter_input(INPUT_POST, 'submission_id', FILTER_VALIDATE_INT);
    $query = 'DELETE FROM form_submission WHERE submission_id = :submission_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":submission_id", $submission_id);
    $statement->execute();
    $statement->closeCursor();
    //echo $visit_id;
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Page</title>
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
                    <li class="item"><a href="home.html #slideshow">Slideshow</a></li>
                    <li class="item"><a href="home.html #newsletter">Newsletter</a></li>
                    <li class="item"><a href="home.html #faqs">FAQs</a></li>
                    <li class="item"><a href="home.html #contact">Contact</a></li>
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
                                    <input type="submit" value="Delete" />
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