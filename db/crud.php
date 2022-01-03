<?php
class crud
{

    //private database object
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    //function to insert a new record into the attendee database
    public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty)
    {
        try {
            //define sql statement to be executed
            $sql = "INSERT INTO attendee (firstName,lastName,dateOfBirth,emailAddress,contactNumber,specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
            //prepare the sql statment execution
            $statment = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $statment->bindparam(':fname', $fname);
            $statment->bindparam(':lname', $lname);
            $statment->bindparam(':dob', $dob);
            $statment->bindparam(':email', $email);
            $statment->bindparam(':contact', $contact);
            $statment->bindparam(':specialty', $specialty);
            //execute statement
            $statment->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty,)
    {
        try {
            $sql = "UPDATE `attendee` SET `firstName`=:fname,`lastName`=:lname,`dateOfBirth`=:dob,`emailAddress`=:email,`contactNumber`=:contact,`specialty_id`=:specialty WHERE attendee_id =:id";
            //prepare the sql statment execution
            $statment = $this->db->prepare($sql);
            //bind all placeholders to the actual values
            $statment->bindparam(':id', $id);
            $statment->bindparam(':fname', $fname);
            $statment->bindparam(':lname', $lname);
            $statment->bindparam(':dob', $dob);
            $statment->bindparam(':email', $email);
            $statment->bindparam(':contact', $contact);
            $statment->bindparam(':specialty', $specialty);
            //execute statement
            $statment->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAttendees()
    {
        try {
            $sql = "SELECT * FROM `attendee`a inner join specialty s on a.specialty_id = s.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAttendeeDetails($id)
    {
        try {
            $sql = "SELECT * from `attendee` a inner join specialty s on a.specialty_id = s.specialty_id where attendee_id = :id";
            $statment = $this->db->prepare($sql);
            $statment->bindparam(':id', $id);
            $statment->execute();
            $result = $statment->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function deleteAttendee($id)
    {
        try {
            $sql = "DELETE from `attendee` where attendee_id =:id";
            $statment = $this->db->prepare($sql);
            $statment->bindparam(':id', $id);
            $statment->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getSpecialties()
    {
        try{
            $sql = "SELECT * FROM `specialty`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
    public function getSpecialtiesById($id)
    {
        try{
            $sql = "SELECT * FROM `specialty` where specialty_id=:id";
            $statment =$this->db->prepare($sql);
            $statment->bindparam(':id',$id);
            $statment->execute();
            $result = $statment->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
}
