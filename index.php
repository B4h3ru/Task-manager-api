<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// echo $uri; ///task-manger-api/
if ($uri === '/task-manager-api/' && $method === 'GET') {
    echo json_encode(["my task manager api is running"]);
    exit;
}

// $uriParts = explode('/task-manger-api/', trim($uri, '/'));

if ($uri === '/task-manager-api/api/tasks' && $method === 'GET') {
    require 'tasks/get.php';
    exit;
}

//user to add new task 
if ($uri === '/task-manager-api/api/tasks' && $method === 'POST') {
    require 'tasks/post.php';
    exit;
}
//
if ($uri === '/task-manager-api/api/tasks' && $method === 'PUT') {
    require 'tasks/put.php';
    exit;
}

if ($uri === '/task-manager-api/api/tasks' && $method === 'DELETE') {
    require 'tasks/delete.php';
    exit;
}

http_response_code(404);


echo json_encode(['error' => 'Endpoint not found']);
