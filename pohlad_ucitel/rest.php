<?php

include '../vytvaranie_testov/Database.php';

if (isset($_GET)) { // get not done
    $stmt = (new Database())->getConnection()->query("SELECT * FROM finished_tests");
    echo json_encode($stmt->fetchAll());
}?>