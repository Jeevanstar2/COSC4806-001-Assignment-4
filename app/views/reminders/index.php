<!DOCTYPE html>
<html>
<head>
    <title>Your Reminders</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h2>Your Reminders</h2>

    <a href="index.php?action=create_reminder" class="button">Add New Reminder</a>

    <?php if (!empty($reminders)): ?>
        <?php foreach ($reminders as $reminder): ?>
            <div class="reminder-box">
                <strong><?= htmlspecialchars($reminder['subject']) ?></strong><br>
                <small>Created at: <?= $reminder['created_at'] ?></small><br>
                <small>Status: <?= $reminder['status'] ?></small><br>
                <?php if (!empty($reminder['deleted_at'])): ?>
                    <small>Deleted at: <?= $reminder['deleted_at'] ?></small><br>
                <?php endif; ?>

                <a href="index.php?action=edit_reminder&id=<?= $reminder['id'] ?>" class="button">Edit</a>
                <a href="index.php?action=delete_reminder&id=<?= $reminder['id'] ?>" class="button" onclick="return confirm('Are you sure you want to delete this reminder?');">Delete</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>You have no reminders yet.</p>
    <?php endif; ?>

    <p><a href="index.php?action=home">Back to Home</a></p>
</body>
</html>
