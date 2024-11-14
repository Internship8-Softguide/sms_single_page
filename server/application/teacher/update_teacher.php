<?php

require_once("../../stroage/db.php");
require_once("../../stroage/teacher_crud.php");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    if (isset($_REQUEST['id'])) {
        $teacher_id = $_REQUEST['id'];
        $inputData = file_get_contents("php://input");
        $postData = json_decode($inputData, true);
        $teacher = update_teacher($mysqli, $teacher_id, $postData['teacher_name'], $postData['teacher_email'], $postData['exp']);
        if ($teacher) {
            echo json_encode(array('status' => 'success', 'code' => 200, 'message' => 'Teacher have been updated!'));
        } else {
            echo json_encode(array('status' => 'success', 'code' => 404, 'message' => 'Teacher does not found'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'code' => 422, 'message' => 'Parameter is require'));
    }
} else {
    echo json_encode(array('status' => 'error', 'code' => 500, 'message' => 'Invalid request method'));
}
