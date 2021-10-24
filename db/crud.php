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
            $sql = "INSERT INTO `hebergement`( `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`) VALUES (:codetypeheb, :nomheb, :bnplaceheb, :surfaceheb, :internet, :anneeheb, :secteurheb, :orientationheb,
            :etatheb, :dscription, :photoheb, :tarifsemheb)";


            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':codetypeheb', $codetypeheb);
            $stmt->bindparam(':nomheb', $nomheb);
            $stmt->bindparam(':bnplaceheb', $bnplaceheb);
            $stmt->bindparam(':surfaceheb', $surfaceheb);
            $stmt->bindparam(':internet', $internet);
            $stmt->bindparam(':anneeheb', $anneeheb);
            $stmt->bindparam(':secteurheb', $secteurheb);
            $stmt->bindparam(':orientationheb', $orientationheb);
            $stmt->bindparam(':etatheb', $etatheb);
            $stmt->bindparam(':dscription', $description);
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
    public function gethebergements()
    {
        try {
            $sql = "SELECT `NOHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`, NOMTYPEHEB FROM `hebergement` , type_heb WHERE hebergement.CODETYPEHEB=type_heb.CODETYPEHEB
            ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getHebergementDetails($id)
    {
        try {
            $sql = "SELECT DISTINCT *  FROM  hebergement, type_heb, resa, etat_resa, semaine WHERE hebergement.CODETYPEHEB=:id AND hebergement.CODETYPEHEB = type_heb.CODETYPEHEB AND hebergement.NOHEB = resa.NOHEB AND resa.CODEETATRESA = etat_resa.CODEETATRESA  And resa.DATEDEBSEM = semaine.DATEDEBSEM";
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

    public function deleteHebergement($id)
    {
        try {
            $sql = "DELETE FROM `hebergement` WHERE NOHEB=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTypeHebergement()
    {
        try {
            $sql = "SELECT * FROM type_heb ";
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
            $sql = "SELECT * FROM type_heb where codetypeheb = :id";
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
    public function GetSemaine()
    {
        try {
            $sql = "SELECT * FROM type_heb ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
