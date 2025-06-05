<?php
require_once __DIR__ . '/../utils.php';

$uriParts = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$id = isset($uriParts[2]) ? (int) $uriParts[2] : 0;

$tasks = readTasks();
$filtered = array_filter($tasks, fn($t) => $t['id'] !== $id);

if (count($filtered) === count($tasks)) {
    http_response_code(404);
    echo json_encode(['error' => 'Task not found']);
    exit;
}
saveTasks(array_values($filtered));
echo json_encode(['message' => 'Task deleted']);


?>