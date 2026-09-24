<?php
require_once __DIR__ . '/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = (int) $_POST['delete_id'];
    $stmt = $conn->prepare('DELETE FROM Movies WHERE id = ?');
    $stmt->bind_param('i', $deleteId);
    $stmt->execute();
    $stmt->close();
    header('Location: admin.php');
    exit;
}

$result = $conn->query('SELECT id, title, year, genre, rating, active FROM Movies ORDER BY title');
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmbeheer</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 24px; background: #f5f7fa; color: #111; }
        h1 { margin-top: 0; }
        a { color: #2563eb; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .top { margin-bottom: 18px; }
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 10px 12px; border: 1px solid #d1d5db; text-align: left; }
        th { background: #e2e8f0; }
        .actions a, .actions button { margin-right: 8px; }
        .actions button { border: 1px solid #d1d5db; background: #fff; color: #111; padding: 6px 10px; border-radius: 6px; cursor: pointer; }
        .actions button:hover { background: #f3f4f6; }
        .empty { padding: 18px; background: white; border: 1px solid #d1d5db; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="top">
        <h1>Filmbeheer</h1>
        <p><a href="add_movie.php">+ Nieuwe film toevoegen</a> | <a href="index.php">Bekijk frontend</a></p>
    </div>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Jaar</th>
                    <th>Genre</th>
                    <th>Rating</th>
                    <th>Actief</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($movie = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($movie['title']); ?></td>
                        <td><?php echo htmlspecialchars($movie['year']); ?></td>
                        <td><?php echo htmlspecialchars($movie['genre']); ?></td>
                        <td><?php echo htmlspecialchars($movie['rating']); ?> %</td>
                        <td><?php echo $movie['active'] ? 'Ja' : 'Nee'; ?></td>
                        <td class="actions">
                            <a href="edit_movie.php?id=<?php echo urlencode($movie['id']); ?>">Bewerken</a>
                            <form method="post" action="admin.php" style="display:inline;" onsubmit="return confirm('Weet je zeker dat je deze film wilt verwijderen?');">
                                <input type="hidden" name="delete_id" value="<?php echo htmlspecialchars($movie['id']); ?>">
                                <button type="submit">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="empty">
            <p>Er zijn nog geen films toegevoegd.</p>
            <p><a href="add_movie.php">Voeg de eerste film toe</a></p>
        </div>
    <?php endif; ?>
</body>
</html>
