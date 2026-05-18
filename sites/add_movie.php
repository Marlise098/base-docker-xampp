<?php
require_once __DIR__ . '/db_connection.php';

$title = '';
$genre = '';
$year = '';
$rating = '';
$length = '';
$thumbnail = '';
$summary = '';
$active = 1;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $year = trim($_POST['year'] ?? '');
    $rating = trim($_POST['rating'] ?? '');
    $length = trim($_POST['length'] ?? '');
    $thumbnail = trim($_POST['thumbnail'] ?? '');
    $summary = trim($_POST['summary'] ?? '');
    $active = isset($_POST['active']) ? 1 : 0;

    if ($title === '' || $year === '' || $genre === '') {
        $error = 'Titel, genre en jaar zijn verplicht.';
    } else {
        $stmt = $conn->prepare('INSERT INTO Movies (title, rating, length, thumbnail, summary, year, genre, submissionDate, active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $submissionDate = date('Y-m-d H:i:s');
        $stmt->bind_param('sissssssi', $title, $rating, $length, $thumbnail, $summary, $year, $genre, $submissionDate, $active);
        $stmt->execute();
        $stmt->close();
        header('Location: admin.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film toevoegen</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; background: #f5f7fa; color: #111; }
        form { background: white; padding: 20px; border: 1px solid #d1d5db; border-radius: 10px; max-width: 700px; }
        label { display: block; margin-top: 14px; font-weight: bold; }
        input[type=text], input[type=number], textarea { width: 100%; padding: 10px; margin-top: 6px; border: 1px solid #cbd5e1; border-radius: 8px; }
        textarea { min-height: 120px; }
        .actions { margin-top: 18px; }
        button { background: #2563eb; color: white; border: none; padding: 10px 16px; border-radius: 8px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .back { margin-left: 12px; color: #2563eb; text-decoration: none; }
        .error { color: #b91c1c; margin-bottom: 12px; }
    </style>
</head>
<body>
    <h1>Film toevoegen</h1>
    <?php if ($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="post" action="add_movie.php">
        <label for="title">Titel</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>

        <label for="genre">Genre</label>
        <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($genre); ?>" required>

        <label for="year">Jaar</label>
        <input type="number" id="year" name="year" value="<?php echo htmlspecialchars($year); ?>" required>

        <label for="rating">Rating</label>
        <input type="number" step="0.1" min="0" max="10" id="rating" name="rating" value="<?php echo htmlspecialchars($rating); ?>">

        <label for="length">Lengte (minuten)</label>
        <input type="number" id="length" name="length" value="<?php echo htmlspecialchars($length); ?>">

        <label for="thumbnail">Thumbnail URL</label>
        <input type="text" id="thumbnail" name="thumbnail" value="<?php echo htmlspecialchars($thumbnail); ?>">

        <label for="summary">Summary</label>
        <textarea id="summary" name="summary"><?php echo htmlspecialchars($summary); ?></textarea>

        <label>
            <input type="checkbox" name="active" <?php echo $active ? 'checked' : ''; ?>> Actief
        </label>

        <div class="actions">
            <button type="submit">Opslaan</button>
            <a class="back" href="admin.php">Annuleren</a>
        </div>
    </form>
</body>
</html>
