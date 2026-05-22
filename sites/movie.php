<?php
require_once __DIR__ . '/db_connection.php';

$movie = null;
$error = null;

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    $error = 'Ongeldige filmlink.';
} else {
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT title, rating, length, summary, year, genre, submissionDate, active FROM Movies WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $movie = $result->fetch_assoc();
    } else {
        $error = 'Film niet gevonden.';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #111;
            margin: 0;
            padding: 24px;
        }
        .container {
            max-width: 720px;
            margin: 0 auto;
            background: #fff;
            padding: 24px;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
        }
        h1 {
            margin-top: 0;
            font-size: 2rem;
        }
        .meta {
            margin: 20px 0;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }
        .meta div {
            background: #f1f5f9;
            padding: 12px;
            border-radius: 10px;
        }
        .summary {
            line-height: 1.7;
            margin-bottom: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 12px;
            color: #2563eb;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .error {
            color: #b91c1c;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <?php if ($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <p><a class="back-link" href="index.php">Terug naar overzicht</a></p>
    <?php else: ?>
        <h1><?php echo htmlspecialchars($movie['title']); ?></h1>
        <p><strong>Genre:</strong> <?php echo htmlspecialchars($movie['genre']); ?></p>
        <div class="meta">
            <div><strong>Jaar</strong><br><?php echo htmlspecialchars($movie['year']); ?></div>
            <div><strong>Rating</strong><br><?php echo htmlspecialchars($movie['rating']); ?>/ 100%</div>
            <div><strong>Lengte</strong><br><?php echo htmlspecialchars($movie['length']); ?> </div>
            <div><strong>Status</strong><br><?php echo ($movie['active'] ? 'Actief' : 'Niet actief'); ?></div>
        </div>
        <div class="summary">
            <h2>Summary</h2>
            <p><?php echo nl2br(htmlspecialchars($movie['summary'])); ?></p>
        </div>
        <p><strong>Toegevoegd op:</strong> <?php echo htmlspecialchars($movie['submissionDate']); ?></p>
        <p><a class="back-link" href="index.php">Terug naar overzicht</a></p>
    <?php endif; ?>
</div>
</body>
</html>
