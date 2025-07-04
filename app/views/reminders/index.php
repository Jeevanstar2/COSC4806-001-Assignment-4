<!DOCTYPE html>
<html>
<head>
    <title>Your Reminders</title>
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <h2>Your Reminders</h2>
    <p><a href="index.php?action=create_reminder">Add a Reminder</a> | 
       <a href="index.php?action=home">Home</a> | 
       <a href="index.php?action=logout">Logout</a></p>
    <?php if (empty($reminders)): ?>
        <p>No reminders found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reminders as $reminder): ?>
                    <tr>
                        <td><?= htmlspecialchars($reminder['subject']) ?></td>
                        <td><?= htmlspecialchars($reminder['created_at']) ?></td>
                        <td>
                            <a href="index.php?action=edit_reminder&id=<?= $reminder['id'] ?>">Edit</a> |
                            <a href="index.php?action=delete_reminder&id=<?= $reminder['id'] ?>" onclick="return confirm('Delete this reminder?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>