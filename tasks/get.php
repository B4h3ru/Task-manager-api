
<?php
require_once __DIR__ . '/../utils.php';

//gets all lists of tasks
echo json_encode(readTasks());
