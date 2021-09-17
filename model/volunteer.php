<?php

/*
 * Date: 09/17/2021
 * Name: Brianna Baldwin
 * Description: Class to connect to database with constructor
 * Mod Log:
 *      09/17/2021 - added Volunteer and VolunteerDB classes
 */

class Volunteer {

    private $first_name, $last_name;

    public function __construct($first_name, $last_name) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

}

class VolunteerDB {

    public static function getVolunteers() {
        $db = Database::getDB();
        $query = 'SELECT first_name, last_name 
FROM volunteer
ORDER BY last_name';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $statement->closeCursor();

        $volunteers = array();
        foreach ($rows as $row) {
            $volunteer = new Volunteer($row['first_name'], $row['last_name']);
            $volunteers[] = $volunteer;
        }
        return $volunteers;
    }

    public static function getVolunteerList() {
        $db = Database::getDB();
        $queryVolunteer = 'SELECT * FROM volunteer';
        $statement1 = $db->prepare($queryVolunteer);
        $statement1->execute();
        $volunteers = $statement1;
        return $volunteers;
    }

}

?>