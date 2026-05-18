<?php
require_once __DIR__ . '/db_connection.php';

$error = '';
$movie = null;

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    $error = 'Ongeldige film geselecteerd.';
} else {
    $movieId = (int) $_GET['id'];
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
            $stmt = $conn->prepare('UPDATE Movies SET title = ?, rating = ?, length = ?, thumbnail = ?, summary = ?, year = ?, genre = ?, active = ? WHERE id = ?');
            $stmt->bind_param('sissssiii', $title, $rating, $length, $thumbnail, $summary, $year, $genre, $active, $movieId);
            $stmt->execute();
            $stmt->close();
            header('Location: admin.php');
            exit;
        }
    }

    $stmt = $conn->prepare('SELECT title, rating, length, thumbnail, summary, year, genre, active FROM Movies WHERE id = ?');
    $stmt->bind_param('i', $movieId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $movie = $result->fetch_assoc();
    } else {
        $error = 'Film niet gevonden.';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film bewerken</title>
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
    <h1>Film bewerken</h1>
    <?php if ($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <p><a class="back" href="admin.php">Terug naar beheer</a></p>
    <?php elseif ($movie): ?>
        <form method="post" action="edit_movie.php?id=<?php echo urlencode($movieId); ?>">
            <label for="title">Titel</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($movie['title']); ?>" required>

            <label for="genre">Genre</label>
            <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($movie['genre']); ?>" required>

            <label for="year">Jaar</label>
            <input type="number" id="year" name="year" value="<?php echo htmlspecialchars($movie['year']); ?>" required>

            <label for="rating">Rating</label>
            <input type="number" step="0.1" min="0" max="10" id="rating" name="rating" value="<?php echo htmlspecialchars($movie['rating']); ?>">

            <label for="length">Lengte (minuten)</label>
            <input type="number" id="length" name="length" value="<?php echo htmlspecialchars($movie['length']); ?>">

            <label for="thumbnail">Thumbnail URL</label>
            <input type="text" id="thumbnail" name="thumbnail" value="<?php echo htmlspecialchars($movie['thumbnail']); ?>">

            <label for="summary">Summary</label>
            <textarea id="summary" name="summary"><?php echo htmlspecialchars($movie['summary']); ?></textarea>

            <label>
                <input type="checkbox" name="active" <?php echo $movie['active'] ? 'checked' : ''; ?>> Actief
            </label>

            <div class="actions">
                <button type="submit">Opslaan</button>
                <a class="back" href="admin.php">Annuleren</a>
            </div>
        </form>
    <?php endif; ?>
</body>
</html>
