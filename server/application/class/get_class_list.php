<?php

require_once("../../stroage/db.php");
require_once("../../stroage/class_crud.php");

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $classes = get_all_class($mysqli);
    $class_list = [];
    while ($class = $classes->fetch_assoc()) {
        array_push($class_list, $class);
    }
    echo json_encode($class_list);
} else {
    echo json_encode(array('status' => 'error', 'code' => 500, 'message' => 'Invalid request method'));
}
