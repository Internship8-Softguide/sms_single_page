<?php

require_once("../../stroage/db.php");
require_once("../../stroage/student_crud.php");
require_once("../../stroage/class_crud.php");
require_once("../../stroage/batch_crud.php");
require_once("../../stroage/teacher_crud.php");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $students = get_all_student($mysqli);
    $student_count = count($students->fetch_all());

    $data = ["student" =>  $student_count,"teacher" => 10,"batch" => 40,"class" => 5];

    echo json_encode($data);
} else {
    echo json_encode(array('status' => 'error', 'code' => 500, 'message' => 'Invalid request method'));
}
