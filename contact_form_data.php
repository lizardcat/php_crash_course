<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Only POST allowed"]);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

if (strlen($name) < 2) {
    $errors['name'] = "Name must be at least 2 characters";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format";
}

if (strlen($message) === 0 || strlen($message) > 500) {
    $errors['message'] = "Message must be between 1 and 500 characters";
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(["errors" => $errors]);
    exit;
}

$timestamp = date('Y-m-d H:i:s');
$entry = "[$timestamp] Name: $name, Email: $email, Message: $message\n";

file_put_contents('contacts.txt', $entry, FILE_APPEND);

echo json_encode(["message" => "Contact saved"]);
