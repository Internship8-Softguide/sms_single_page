<?php

require_once("../../stroage/db.php");
require_once("../../stroage/teacher_crud.php");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputData = file_get_contents("php://input");
    $postData = json_decode($inputData, true);
    $exp = $postData['exp'];
    if ($exp === "") {
        echo json_encode(array('status' => 'error', 'code' => 405, 'message' => 'Exp can not be blank!'));
        return;
    } else {
        if (!preg_match("/^\d+$/", $exp)) {
            echo json_encode(array('status' => 'error', 'code' => 405, 'message' => 'Exp should be only number!'));
            return;
        }
    }
    $status = add_teacher($mysqli, $postData['teacher_name'], $postData['teacher_email'], $exp);
    if ($status) {
        echo json_encode(array('status' => 'success', 'code' => 200, 'message' => 'Teacher have been save!'));
    } else {
        echo json_encode(array('status' => 'error', 'code' => 400, 'message' => 'Teacher can not save!'));
    }
} else {
    echo json_encode(array('status' => 'error', 'code' => 500, 'message' => 'Invalid request method'));
}
