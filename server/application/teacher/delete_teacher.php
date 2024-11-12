<?php

require_once("../../stroage/db.php");
require_once("../../stroage/teacher_crud.php");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_REQUEST['id'])) {
        $teacher_id = $_REQUEST['id'];
        $status = delete_teacher($mysqli, $teacher_id);
        if ($status) {
            echo json_encode(array('status' => 'success', 'code' => 200, 'message' => 'Teacher is deleted'));
        } else {
            echo json_encode(array('status' => 'success', 'code' => 404, 'message' => 'Teacher does not found'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'code' => 455, 'message' => 'Parameter is require'));
    }
} else {
    echo json_encode(array('status' => 'error', 'code' => 500, 'message' => 'Invalid request method'));
}
