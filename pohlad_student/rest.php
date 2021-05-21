<?php

include '../vytvaranie_testov/Database.php';

if (isset($_POST)) {
    try {
        $sql = "SELECT * FROM cheating_monitor WHERE ais_id = ? AND test_key = ?";
        $conn = (new Database())->getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute([(int)$_POST['ais_id'], $_POST['test_key']]);
        $cheated = $stmt->fetch();

        if (empty($cheated)) {
            $sql = "INSERT INTO cheating_monitor (ais_id, left_count, test_key, forename, surname) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['ais_id'], 1, $_POST['test_key'], $_POST['forename'], $_POST['surname']]);
        } else {
            $sql = "UPDATE cheating_monitor SET left_count = ? WHERE ais_id = ? AND test_key = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([((int)$cheated['left_count']) + 1, $cheated['ais_id'], $cheated['test_key']]);
        }
    } catch (Exception $e) {
        echo $e;
    }
    return true;
}
