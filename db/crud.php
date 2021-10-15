<?php
class crud
{
    // private database object\
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert a new record into the attendee database

    public function inserthebergement(
        $noheb,
        $codetypeheb,
        $nomheb,
        $bnplaceheb,
        $surfaceheb,
        $internet,
        $anneeheb,
        $secteurheb,
        $orientationheb,
        $etatheb,
        $description,
        $photoheb,
        $tarifsemheb
    ) {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO hebergement (:noheb, :codetypeheb, :nomheb, :bnplaceheb, :surfaceheb, :internet, :anneeheb, :secteurheb, :orientationheb,
                :etatheb, :description, :photoheb, :tarifsemheb) VALUES (:fname,:lname,:dob,:email,:contact,:specialty,:avatar_path)";
            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':noheb', $noheb);
            $stmt->bindparam(':codetypeheb', $codetypeheb);
            $stmt->bindparam(':nomheb', $nomheb);
            $stmt->bindparam(':bnplaceheb', $bnplaceheb);
            $stmt->bindparam(':surfaceheb', $surfaceheb);
            $stmt->bindparam(':internet', $internet);
            $stmt->bindparam(':anneeheb', $anneeheb);
            $stmt->bindparam(':secteurheb', $secteurheb);
            $stmt->bindparam(':orientationheb', $orientationheb);
            $stmt->bindparam(':etatheb', $etatheb);
            $stmt->bindparam(':description', $description);
            $stmt->bindparam(':photoheb', $photoheb);
            $stmt->bindparam(':tarifsemheb', $tarifsemheb);

            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function edithebergement(
        $noheb,
        $codetypeheb,
        $nomheb,
        $bnplaceheb,
        $surfaceheb,
        $internet,
        $anneeheb,
        $secteurheb,
        $orientationheb,
        $etatheb,
        $description,
        $photoheb,
        $tarifsemheb
    ) {
        try {
            $sql = "UPDATE `hebergement` SET noheb=:noheb, codetypeheb=:codetypeheb, nomheb=:nomheb, nbplaceheb=:bnplaceheb, surfaceheb=:surfaceheb, internet=:internet, anneeheb=:anneheb, secteurheb=secteurheb, orientationheb=:orientationheb,
                etatheb=:etatheb, description=:description, photoheb=:photoheb, tarifsemheb=:tarifsemheb WHERE noheb = :noheb ";
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':noheb', $noheb);
            $stmt->bindparam(':codetypeheb', $codetypeheb);
            $stmt->bindparam(':nomheb', $nomheb);
            $stmt->bindparam(':bnplaceheb', $bnplaceheb);
            $stmt->bindparam(':surfaceheb', $surfaceheb);
            $stmt->bindparam(':internet', $internet);
            $stmt->bindparam(':anneeheb', $anneeheb);
            $stmt->bindparam(':secteurheb', $secteurheb);
            $stmt->bindparam(':orientationheb', $orientationheb);
            $stmt->bindparam(':etatheb', $etatheb);
            $stmt->bindparam(':description', $description);
            $stmt->bindparam(':photoheb', $photoheb);
            $stmt->bindparam(':tarifsemheb', $tarifsemheb);
            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    // le reste est non traité
    public function getAttendees()
    {
        try {
            $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
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
            $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id 
                where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee($id)
    {
        try {
            $sql = "delete from attendee where attendee_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialties()
    {
        try {
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialtyById($id)
    {
        try {
            $sql = "SELECT * FROM `specialties` where specialty_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
