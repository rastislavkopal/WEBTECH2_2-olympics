<?php

/*
 * Performs all operations on data // outgoing // incoming
 */
class OlympicsModel
{
    private $db_pass;
    private $db_name;
    private $server_name;


    function __construct()
    {
        require_once '/home/xkopalr1/public_html/config.php';

        if (empty($username) || empty($password) || empty($servername))
            echo "Cannot be empty string.";

        $this->db_name = $username;
        $this->db_pass = $password;
        $this->server_name = $servername;
    }


    private function getConnection()
    {
        try{
            $conn = new PDO("mysql:host=$this->server_name;dbname=zadanie2", $this->db_name, $this->db_pass);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            return "Connection failed: " . $e->getMessage();
        }
    }


    public function getOlympicWinners()
    {
        $dataArr = array();
        try {
            $conn = $this->getConnection();

            $q = $conn->query("
SELECT persons.id, CONCAT(persons.name,' ',persons.surname) as name, olympics.year, olympics.city, olympics.type, placements.discipline
FROM placements
LEFT JOIN persons ON placements.person_id=persons.id
LEFT JOIn olympics ON placements.oh_id=olympics.id
WHERE placements.placing=1;
    ");
            while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
                $r['name'] = "<a href='" . 'http://wt78.fei.stuba.sk/zadanie2/views/userProfile.php?id=' . $r['id'] ."'>" . $r['name'] . "</a>";
                unset($r['id']);
                $dataArr[] = $r;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return json_encode($dataArr);
    }


    public function getPlacementsById($id)
    {
        $dataArr = array();
        try {
            $conn = $this->getConnection();

            $q = $conn->prepare("
SELECT persons.id, CONCAT(persons.name,' ',persons.surname) as name, olympics.year, olympics.city, olympics.type, placements.discipline
FROM placements
LEFT JOIN persons ON placements.person_id=persons.id
LEFT JOIn olympics ON placements.oh_id=olympics.id
WHERE placements.person_id=:id");
            $q->execute(array(":id" => $id));

            while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
                $r['name'] = "<a href='" . 'http://wt78.fei.stuba.sk/zadanie2/views/userProfile.php?id=' . $r['id'] ."'>" . $r['name'] . "</a>";
                unset($r['id']);
                $dataArr[] = $r;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return json_encode($dataArr);
    }


    public function getTopTen()
    {
        $dataArr = array();
        try {
            $conn = $this->getConnection();

            $q = $conn->query("
SELECT persons.id, CONCAT(persons.name,' ', persons.surname) as name, COUNT(placements.person_id) as wins
FROM placements
LEFT JOIN persons ON placements.person_id=persons.id
WHERE placements.placing=1
GROUP BY placements.person_id
ORDER BY wins DESC
LIMIT 10;
    ");
            while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
                $r["update"] =  '<a href="#" onclick=updateRowById("id=' . $r['id'] . '")>UPRAVIŤ</a>';
                $r["delete"] = '<a href="#" onclick=deleteRowById("action=delete&id=' . $r['id'] . '")>ZMAZAŤ</a>';
                $r['name'] = "<a href='" . 'http://wt78.fei.stuba.sk/zadanie2/views/userProfile.php?id=' . $r['id'] ."'>" . $r['name'] . "</a>";
                unset($r['id']);
                $dataArr[] = $r;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return json_encode($dataArr);
    }


    public function deletePersonById($id)
    {
        try {
            $conn = $this->getConnection();

            $count=$conn->prepare("DELETE FROM persons WHERE id=:id");
            $count->bindParam(":id",$id,PDO::PARAM_INT);
            if($count->execute() && $count->rowCount())
                echo "Záznam bol úspešne zmazaný.";
            else
                echo "Nastala neočakávaná chyba. Prosím skúste to znova.";

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function getUserData($id)
    {
        try {
            $conn = $this->getConnection();

            $query = $conn->prepare("SELECT * FROM persons WHERE id=:id");
            $query->bindParam(":id",$id,PDO::PARAM_INT);
            $query->execute();
            return $query->fetch();
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function updateUserById($arr, $id)
    {
        try {
            $conn = $this->getConnection();

            $query = $conn->prepare("
UPDATE persons SET name=:name, surname=:surname, birth_day=:birth_day, birth_place=:birth_place ,
    birth_country=:birth_country, death_day=:death_day, death_place=:death_place, death_country=:death_country
WHERE id=:id");

            foreach($arr as $Name => &$Value)
                $query->bindParam(':'.$Name, $Value, PDO::PARAM_STR);
            $query->bindParam( ":id" ,$id,PDO::PARAM_INT);

            if($query->execute() && $query->rowCount())
                echo "Záznam bol úspešne upravený.";
            else
                echo "Nastala neočakávaná chyba. Prosím skúste to znova.";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function createPerson($arr)
    {
        try {
            $conn = $this->getConnection();

            // check whether the person already exists, with same name and date
            $q= $conn->prepare("SELECT id FROM persons WHERE name=:name AND surname=:surname AND birth_day=:birth_day");
            $q->bindParam(":name",$arr['name'],PDO::PARAM_STR);
            $q->bindParam(":surname",$arr['surname'],PDO::PARAM_STR);
            $q->bindParam(":birth_day",$arr['birth_day'],PDO::PARAM_STR);
            if (!$q->execute() || $q->fetch()['id'] != 0 ){ // if id is not zero => user already exists
                echo "Osoba s takymto menom, priezviskom aj datum už existuje v databáze.";
                return;
            }

            $query = $conn->prepare("
INSERT INTO persons (name, surname, birth_day, birth_place, birth_country, death_day, death_place, death_country)
       VALUES(:name, :surname, :birth_day, :birth_place, :birth_country, :death_day, :death_place, :death_country)
       ");

            foreach($arr as $Name => &$Value)
                $query->bindParam(':'.$Name, $Value, PDO::PARAM_STR);

            if($query->execute() && $query->rowCount() > 0)
                echo "Záznam bol úspešne pridany.";
            else
                echo "Nastala neočakávaná chyba. Prosím skúste to znova.";

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function getPersons_id_name_surname()
    {
        $dataArr = array();
        try {
            $conn = $this->getConnection();

            $q = $conn->query("SELECT id, name, surname FROM persons");
            while ($r = $q->fetch(PDO::FETCH_ASSOC))
                $dataArr[] = $r;

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $dataArr;
    }

    public function getOlympics_id_type_year()
    {
        $dataArr = array();
        try {
            $conn = $this->getConnection();
            $q = $conn->query("SELECT id, type, year FROM olympics");
            $dataArr = $q->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $dataArr;
    }


    public function createPlacing($arr, $discipline)
    {
        try {
            $conn = $this->getConnection();

            $query = $conn->prepare("INSERT INTO placements (person_id, oh_id, placing, discipline) 
                                                  VALUES (:person_id, :oh_id, :placing, :discipline )");

            foreach($arr as $Name => &$Value)
                $query->bindParam(':'.$Name, $Value, PDO::PARAM_INT);

            $query->bindParam(':discipline', $discipline, PDO::PARAM_STR);

            if($query->execute()){
                echo "Záznam bol úspešne pridany.";
            } else {
                echo "Nastala neočakávaná chyba. Prosím skúste to znova.";
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}


