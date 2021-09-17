<?php

/*
 * Date: 09/17/2021
 * Name: Brianna Baldwin
 * Description: Class to connect to database with constructor
 * Mod Log:
 *      09/17/2021 - functions for volunteer submissions
 */

function getSubmissionByEmp($volunteer_id) {
    $db = Database::getDB();
    $query2 = 'SELECT submission_id, submission_date, form_submission.email, comments, phone, contact_by, form_submission.volunteer_id
                FROM form_submission
                JOIN volunteer on form_submission.volunteer_id = volunteer.volunteer_id
                WHERE volunteer.volunteer_id = :volunteer_id
                ORDER BY submission_date';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":volunteer_id", $volunteer_id);
    $statement2->execute();
    $submissions = $statement2;

    return $submissions;
}

function delSubmission($submission_id) {
    $db = Database::getDB();
    $submission_id = filter_input(INPUT_POST, 'submission_id', FILTER_VALIDATE_INT);
    $query = 'DELETE FROM form_submission WHERE submission_id = :submission_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":submission_id", $submission_id);
    $statement->execute();
    $statement->closeCursor();
}

function addSubmission($email_address, $phone, $country_selected, $contact, $terms, $comments) {
    $db = Database::getDB();
    $query = "INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
        VALUES
    	(:email_address, :phone, :country_selected, :contact, :terms, :comments, NOW(), 1)";

    $statement = $db->prepare($query);
    $statement->bindValue(':email_address', $email_address);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':country_selected', $country_selected);
    $statement->bindValue(':contact', $contact);
    $statement->bindValue(':terms', $terms);
    $statement->bindValue(':comments', $comments);
    $statement->execute();
    $statement->closeCursor();
}

?>