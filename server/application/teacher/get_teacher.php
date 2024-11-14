<?php

require_once("../../stroage/db.php");
require_once("../../stroage/teacher_crud.php");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_REQUEST['id'])) {
        $teacher_id = $_REQUEST['id'];
        $teacher = get_teacher_id($mysqli, $teacher_id);
        if ($teacher) {
            echo json_encode($teacher);
        } else {
            echo json_encode(array('status' => 'success', 'code' => 404, 'message' => 'Teacher does not found'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'code' => 422, 'message' => 'Parameter is require'));
    }
} else {
    echo json_encode(array('status' => 'error', 'code' => 500, 'message' => 'Invalid request method'));
}
