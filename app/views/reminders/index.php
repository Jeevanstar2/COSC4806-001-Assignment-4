<!DOCTYPE html>
<html>
<head>
    <title>Reminders</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Your Reminders</h2>
    <a href="index.php?action=reminder&task=create">+ Add New Reminder</a>
    <ul>
        <?php foreach ($reminders as $rem): ?>
            <li>
                <?= htmlspecialchars($rem['subject']) ?>
                <a href="index.php?action=reminder&task=edit&id=<?= $rem['id'] ?>">Edit</a>
                <a href="index.php?action=reminder&task=delete&id=<?= $rem['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="index.php?action=home">Back to Home</a></p>
</body>
</html>
