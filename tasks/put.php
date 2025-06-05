
<?php
require_once __DIR__ . '/../utils.php';

$uriParts = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
$id = isset($uriParts[2]) ? (int) $uriParts[2] : 0;

$tasks = readTasks();
foreach ($tasks as &$task) {
    if ($task['id'] === $id) {
        $task['completed'] = true;
        saveTasks($tasks);
        echo json_encode($task);
        exit;
    }
}
http_response_code(404);
echo json_encode(['error' => 'Task not found']);


?>