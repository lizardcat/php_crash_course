<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$method = $_SERVER['REQUEST_METHOD'];
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$resource = $requestUri[0] ?? '';
$id = $requestUri[1] ?? null;

$dataFile = 'tasks.json';
if (!file_exists($dataFile)) file_put_contents($dataFile, json_encode([]));

function readTasks() {
    global $dataFile;
    return json_decode(file_get_contents($dataFile), true);
}

function writeTasks($tasks) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($tasks, JSON_PRETTY_PRINT));
}

function getInputData() {
    return json_decode(file_get_contents('php://input'), true);
}

function findTaskById($tasks, $id) {
    foreach ($tasks as $task) {
        if ($task['id'] == $id) return $task;
    }
    return null;
}

if ($resource !== 'tasks') {
    http_response_code(404);
    echo json_encode(["error" => "Resource not found"]);
    exit;
}

$tasks = readTasks();

switch ($method) {
    case 'GET':
        if ($id) {
            $task = findTaskById($tasks, $id);
            if (!$task) {
                http_response_code(404);
                echo json_encode(["error" => "Task not found"]);
                exit;
            }
            echo json_encode($task);
        } else {
            echo json_encode(array_values($tasks));
        }
        break;

    case 'POST':
        $input = getInputData();
        if (!isset($input['title'])) {
            http_response_code(400);
            echo json_encode(["error" => "Missing 'title' field"]);
            exit;
        }
        $newTask = [
            "id" => time(),
            "title" => htmlspecialchars($input['title']),
            "completed" => false
        ];
        $tasks[] = $newTask;
        writeTasks($tasks);
        http_response_code(201);
        echo json_encode($newTask);
        break;

    case 'PUT':
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "Missing ID"]);
            exit;
        }
        $input = getInputData();
        $updated = false;
        foreach ($tasks as &$task) {
            if ($task['id'] == $id) {
                if (isset($input['title'])) $task['title'] = htmlspecialchars($input['title']);
                if (isset($input['completed'])) $task['completed'] = (bool)$input['completed'];
                $updated = true;
                break;
            }
        }
        if (!$updated) {
            http_response_code(404);
            echo json_encode(["error" => "Task not found"]);
            exit;
        }
        writeTasks($tasks);
        echo json_encode(["message" => "Task updated"]);
        break;

    case 'DELETE':
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "Missing ID"]);
            exit;
        }
        $filtered = array_filter($tasks, fn($t) => $t['id'] != $id);
        if (count($filtered) == count($tasks)) {
            http_response_code(404);
            echo json_encode(["error" => "Task not found"]);
            exit;
        }
        writeTasks(array_values($filtered));
        echo json_encode(["message" => "Task deleted"]);
        break;

    case 'OPTIONS':
        http_response_code(204);
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
}
