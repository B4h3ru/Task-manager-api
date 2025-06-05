
<?php
$dataFile = 'tasks.json';

function readTasks()
{
    global $dataFile;
    if (!file_exists($dataFile)) {
        file_put_contents($dataFile, json_encode([]));
    }
    return json_decode(file_get_contents($dataFile), true);
}

function saveTasks($tasks)
{
    global $dataFile;
    file_put_contents($dataFile, json_encode($tasks, JSON_PRETTY_PRINT));
}
?>