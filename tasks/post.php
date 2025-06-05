
<?php
require_once __DIR__ . '/../utils.php';

$input = json_decode(file_get_contents('php://input'), true);
if (!isset($input['title'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Title is required']);
    exit;
}

$tasks = readTasks();
$id = count($tasks) > 0 ? end($tasks)['id'] + 1 : 1;
$task = ['id' => $id, 'title' => $input['title'], 'completed' => $input['completed']];
$tasks[] = $task;
saveTasks($tasks);

echo json_encode($task);



?>