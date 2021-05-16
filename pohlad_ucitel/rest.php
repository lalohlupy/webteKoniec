<?php
if (isset($_GET)) { // get not done
    $workingStudents = [array("name" => "Jozo"), array("name" => "Fero")];
    echo json_encode($workingStudents);
}?>