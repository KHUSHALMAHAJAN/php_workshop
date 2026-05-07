<?php
header("Content-Type: application/json");

$users = [
    1 => ["id" => 1, "name" => "khushal"],
    2 => ["id" => 2, "name" => "kunal"],
    3 => ["id" => 3, "name" => "mahajan"]
];

$request = $_SERVER['REQUEST_URI'];

$parts = explode("/", $request);

$id = null;
foreach ($parts as $key => $value) {
    if ($value == "user") {
        $id = $parts[$key + 1] ?? null;
        break;
    }
}

if ($id && isset($users[$id])) {
    echo json_encode($users[$id]);
} else {
    echo json_encode([
        "error" => "User not found"
    ]);
}
?>