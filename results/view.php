<?php
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Test ID ఇవ్వలేదు.";
    exit;
}

$dataFile = __DIR__ . '/../ls_db/' . basename($id) . '.json';

if (!file_exists($dataFile)) {
    echo "ఫలితం దొరకలేదు.";
    exit;
}

$data = json_decode(file_get_contents($dataFile), true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Speed Test ఫలితం - <?php echo htmlspecialchars($id); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 2rem;
            background-color: #f5f5f5;
        }
        .result-box {
            background: #fff;
            border-radius: 8px;
            padding: 1.5rem;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px #ccc;
        }
        .label {
            font-weight: bold;
        }
        .value {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <h2>Speed Test ఫలితం</h2>
        <div class="value"><span class="label">Test ID:</span> <?php echo htmlspecialchars($id); ?></div>
        <div class="value"><span class="label">Download:</span> <?php echo $data['dl'] ?? 'లభ్యం కాదు'; ?> Mbps</div>
        <div class="value"><span class="label">Upload:</span> <?php echo $data['ul'] ?? 'లభ్యం కాదు'; ?> Mbps</div>
        <div class="value"><span class="label">Ping:</span> <?php echo $data['ping'] ?? 'లభ్యం కాదు'; ?> ms</div>
        <div class="value"><span class="label">Jitter:</span> <?php echo $data['jitter'] ?? 'లభ్యం కాదు'; ?> ms</div>
        <div class="value"><span class="label">IP:</span> <?php echo $data['ip'] ?? 'లభ్యం కాదు'; ?></div>
        <div class="value"><span class="label">Timestamp:</span> <?php echo $data['timestamp'] ?? 'లభ్యం కాదు'; ?></div>

        <h3>ఫలిత చిత్రం:</h3>
        <img src="./?id=<?php echo htmlspecialchars($id); ?>" alt="Result Image" />
    </div>
</body>
</html>
