<?php

/*
 * Performs all operations on data // outgoing // incoming
 */
class OlympicsModel
{
    private $db_pass;
    private $db_name;
    private $server_name;

    function __construct($username, $password, $servername)
    {
        if (empty($username) || empty($password) || empty($servername))
            echo "Cannot be empty string.";
        $this->db_name = $username;
        $this->db_pass = $password;
        $this->server_name = $servername;
    }


    public function getOlympicWinners()
    {
        $dataArr = array();
        try {
            $conn = new PDO("mysql:host=$this->server_name;dbname=zadanie2", $this->db_name, $this->db_pass);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $q = $conn->query("
    SELECT placements.person_id, persons.name, persons.surname, olympics.year, olympics.city, olympics.type, placements.discipline
        FROM placements
	    LEFT JOIN persons ON placements.person_id=persons.id
        LEFT JOIn olympics ON placements.oh_id=olympics.id;
    ");
            $q->setFetchMode(PDO::FETCH_ASSOC);
            while ($r = $q->fetch()) {
                $dataArr[] = $r;
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return json_encode($dataArr);
    }
}


