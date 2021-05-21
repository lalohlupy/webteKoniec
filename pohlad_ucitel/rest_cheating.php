<?php

include '../vytvaranie_testov/Database.php';

if (isset($_GET)) {
    try {
        $sql = "SELECT * FROM cheating_monitor";
        $result = (new Database())->getConnection()->query($sql);
        echo json_encode($result->fetchAll());
    } catch (Exception $e) {
        echo $e;
    }
}
