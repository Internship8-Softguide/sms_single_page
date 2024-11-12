<?php

require_once("../../stroage/db.php");
require_once("../../stroage/teacher_crud.php");

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $teachers = get_all_teacher($mysqli);
    $teacher_list = [];
    while ($teacher = $teachers->fetch_assoc()) {
        array_push($teacher_list, $teacher);
    }
    echo json_encode($teacher_list);
} else {
    echo json_encode(array('status' => 'error', 'code' => 500, 'message' => 'Invalid request method'));
}
