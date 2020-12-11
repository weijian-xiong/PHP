<?php

include_once 'model/Handout.php';

Class HandoutRepository {

    private $db;

    public function __construct($dbConnection) {

        $this->db = $dbConnection;
    }

    public function getHandoutByWeek($weekNo) {
        $sql = "SELECT * FROM handouts WHERE weekNo = $weekNo";
        $handoutObj = $this->db->query($sql);
        $handoutVal = $handoutObj->fetch();
        if ($handoutVal) {
            $weekHandout = new Handout($handoutVal['weekNo'], $handoutVal['handout']);
            return $weekHandout;
        }
        return NULL;
    }

    public function add_handout($handout) {
        $sql = "INSERT INTO handouts (weekNo, handout) VALUES ("
                . "'$handout->weekNo',"
                . "'$handout->content')";
        $insertCount = $this->db->exec($sql);
        if ($insertCount > 0) {
            return "Handout record was added successfully.";
        } else {
            return "Handout record wasn't added.";
        }
    }

    public function update_handout($handout) {
        $sql = "Update handouts SET "
                . "weekNo = '$handout->weekNo'"
                . ", handout = '$handout->content'"
                . " WHERE weekNo= $handout->weekNo";
        $updateCount = $this->db->exec($sql);
        if ($updateCount > 0) {
            return "Handout record updated successfully.";
        } else {
            return "Handout record wasn't updated.";
        }
    }

}
