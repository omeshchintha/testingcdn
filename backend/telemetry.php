<?php
$telemetry_dir = __DIR__ . '/../ls_db/';
if (!is_dir($telemetry_dir)) {
    mkdir($telemetry_dir, 0775, true);
}

$testId = uniqid();
file_put_contents($telemetry_dir . "$testId.json", json_encode($_POST));

header('Content-Type: application/json');
echo json_encode(['testId' => $testId]);
?>
